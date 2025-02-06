<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;
use App\Models\PaidReview;
use App\Models\Product;
use App\Models\User;
use App\Models\Guideline;
use App\Models\Video;
use App\Models\Payment;

class PaidReviewController extends Controller
{

    public function __construct()
    {
        $this->middleware('Staff')->only([
            'index',
            'store',
            'update',
            'ad_code',
        ]);
        $this->middleware('CC')->only([
            'assignedReview',

        ]);

        $this->middleware('login')->only([
            'updateOrderStatus',

        ]);
    }
    public function index()
    {
        $paidReviews = PaidReview::with(['contentCreator', 'product', 'payments'])->get();
        $products = Product::all();
        $contentcreators = User::where('role', 'Content Creator')->where('is_approved', 1)->get();
        return view('staff.paid-review', compact('paidReviews', 'products', 'contentcreators'));
    }


    public function store(Request $request)
    {
        // $request->validate([

        // ]);

        $invalidRecords = User::whereNull('name')
            ->orWhereNull('phone')
            ->orWhereNull('role')
            ->orWhereNull('tiktok_username')
            ->orWhereNull('tiktok_profile_link')
            ->orWhereNull('ic_number')
            ->orWhereNull('bank_name')
            ->orWhereNull('cardholder_name')
            ->orWhereNull('bank_account_number')
            ->orWhereNull('is_approved')
            ->exists();
        if ($invalidRecords) {
            return redirect()->back()->with('failed', 'Content Creator must fill all details before assigning any reviews.');
        } else {

            $creatorId = $request->content_creator_id;
            $cc = User::where('role', 'Content Creator')->where('id', $creatorId)->first();

            if ($cc->is_approved == 1) {

                $paidReview = PaidReview::create($request->all());

                $video = Video::create([
                    'uploaded_by' => $paidReview->content_creator_id,


                    // ... other video details (e.g., 'reviewed_by', 'reviewed_at', 'feedback')
                ]);

                $paidReview->update([
                    'video_id' => $video->id,
                ]);

                // Create the Payment record, associating it with the PaidReview
                $payment = Payment::create([
                    'paid_review_id' => $paidReview->id,
                    'amount' => $paidReview->deal_rate,
                    'reference_number' => null,
                ]);

                $notiId = User::findOrFail($creatorId);
                $data = [
                    'title' => 'You have been assigned to a review !',
                    'message' => 'Check your review page to see more info.',
                    'url' => '/review-list',
                ];

                $userController = new UserController();
                $userController->sendNotification($notiId, $data);


                return redirect()->back()->with('success', 'Paid Review created successfully.');
            } else {
                return redirect()->back()->with('failed', 'Content Creator must be approved to create a paid review.');
            }
        }
    }

    public function update(Request $request, $id)
    {
        //update tracking number
        if (isset($request->shipment_tracking_number)) {

            $delivered = 'Shipped';
            $paidReview = PaidReview::findOrFail($id);
            $paidReview->update([
                'shipment_tracking_number' => $request->shipment_tracking_number,
                'order_status' => $delivered,
            ]);

            $notiId = User::findOrFail($paidReview->content_creator_id);
            $data = [
                'title' => 'Your review item is ready to be shipped!',
                'message' => 'Check your review page to see more info.',
                'url' => '/review-list',
            ];

            $userController = new UserController();
            $userController->sendNotification($notiId, $data);


            return redirect()->back()->with('success', 'Tracking Number updated successfully.');
        }
        $paidReview = PaidReview::findOrFail($id);
        $paidReview->update($request->all());
        return redirect()->back()->with('success', 'Paid Review updated successfully.');
    }
    public function destroy($id)
    {
        PaidReview::destroy($id);
        return redirect()->route('paid_reviews.index')->with('success', 'Paid Review deleted successfully.');
    }

    public function assignedReview()
    {
        $cc = Auth::user()->id;

        $assignedReviews = PaidReview::with(['product.guidelines'])
            ->where('content_creator_id', $cc)
            ->get();

        // $guideline = Guideline::with(['product'])
        // ->where('product_id','')
        // ->get();
        return view('cc.assigned-review', compact('assignedReviews'));
    }


    public function updateOrderStatus(Request $request, $id)
    {


        if (isset(request()->product_received) == 1) {

            $review = PaidReview::findOrFail($id);
            $review->update([
                'product_received' => $request->product_received,
                'order_status' => 'Delivered',
            ]);
        } else {
            $review = PaidReview::findOrFail($id);

            $review->update($request->all());
            return redirect()->back()->with('success', 'Review updated successfully.');
        }

        return redirect()->back()->with('failed', 'Review Cannot be Updated');
    }

    public function ad_code()
    {
        // Get all paid reviews for content creators with their associated content creators and videos
        // In your controller or wherever you are querying
        $reviews = Video::with(['paidReviews', 'uploader'])
            ->whereHas('uploader', function ($query) {
                $query->where('role', 'Content Creator');
            })
            ->get();
        // $reviews = PaidReview::with(['contentCreator', 'video'])
        //     ->whereHas('contentCreator', function ($query) {
        //         $query->where('role', 'Content Creator');
        //     })
        //     ->get();
        // Return the view with the paid reviews
        return view('staff.code-ad', compact('reviews'));
    }
}
