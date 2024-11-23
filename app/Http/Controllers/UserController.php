<?php

namespace App\Http\Controllers;

use App\Models\PaidReview;
use App\Models\Payment;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('Staff')->only([
            
            'staffDashboard',
        ]);
        
        $this->middleware('CC')->only([
            'contentCreatorDashboard',

        ]);
        
        $this->middleware('login')->only([
            'index',
            'show',
            'update',

        ]);
    }
    public function index()
    {

        $id = Auth::id();

        if (Auth::user()->role == 'Content Creator') {
            $user = User::where('role', 'Content Creator')->findOrFail($id);
            return view('cc.profile-cc', compact('user'));
        } else {
            $users = User::where('role', 'Content Creator')->get();
            return view('staff.list-cc', compact('users'));
        }
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email', // Check for unique email
            'password' => 'required|string|min:8|confirmed', // Require confirmation
            'phone' => 'nullable|string|max:20', // Allow phone to be optional
            'role' => 'required|string|in:admin,user', // Ensure role is valid
        ]);

        User::create($request->all());
        return redirect()->route('users.index')->with('success', 'User  created successfully.');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        if (Auth::user()->role == 'Staff' || Auth::user()->role == 'Admin' || Auth::user()->role == 'Finance') {
            return view('staff.profile', compact('user'));
        } else {
            return view('cc.profile-cc', compact('user'));
        }
    }



    public function update(Request $request, $id)
    {
  
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->back()->with('success', 'Information  updated successfully.');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('users.index')->with('success', 'User  deleted successfully.');
    }


    #ADDITIONAL FUNCTION 

    public function staffDashboard()
    {
        // General Stats
        $totalPayments = Payment::sum('amount');
        $totalAssignedReviews = PaidReview::count();
        $totalApprovedVideos = Video::where('status', 'Approved')->count();
        $totalPendingVideos = Video::where('status', 'Pending')->count();
        $totalContentCreators = User::where('role', 'Content Creator')->where('is_approved', true)->count();

        // Review Status Data
        $pendingReviews = PaidReview::where('order_status', 'Pending')->count();
        $inProgressReviews = PaidReview::where('order_status', 'In Progress')->count();
        $completedReviews = PaidReview::where('order_status', 'Completed')->count();
        $totalReviews = PaidReview::count();
        $reviewCompletionRate = ($totalReviews > 0) ? ($completedReviews / $totalReviews) * 100 : 0;

        // Monthly Video Stats
        $monthlyVideosApproved = Video::where('status', 'Approved')
            ->whereMonth('created_at', now()->month)
            ->count();
        $monthlyVideosTotal = Video::whereMonth('created_at', now()->month)->count();
        $monthlyVideoGrowth = ($monthlyVideosTotal > 0) ? ($monthlyVideosApproved / $monthlyVideosTotal) * 100 : 0;

        // Yearly Payment Stats
        $yearlyPaymentsCompleted = Payment::where('status', 'Completed')
            ->whereYear('created_at', now()->year)
            ->sum('amount');
        $yearlyPaymentsTotal = Payment::whereYear('created_at', now()->year)->count();
        $yearlyPaymentGrowth = ($yearlyPaymentsTotal > 0) ? ($yearlyPaymentsCompleted / $yearlyPaymentsTotal) * 100 : 0;

        // Pass data to the view
        return view('staff.dashboard', compact(
            'totalPayments',
            'totalAssignedReviews',
            'totalApprovedVideos',
            'totalPendingVideos',
            'totalContentCreators',
            'pendingReviews',
            'inProgressReviews',
            'completedReviews',
            'reviewCompletionRate',
            'monthlyVideosApproved',
            'monthlyVideosTotal',
            'monthlyVideoGrowth',
            'yearlyPaymentsCompleted',
            'yearlyPaymentsTotal',
            'yearlyPaymentGrowth'
        ));
    }

    public function contentCreatorDashboard()
    {
        $userId = Auth::id();

        // Total earnings from completed payments
        $totalEarnings = Payment::whereHas('paidReview', function ($query) use ($userId) {
            $query->where('content_creator_id', $userId);
        })->sum('amount');

        // Assigned reviews count
        $assignedReviewsCount = PaidReview::where('content_creator_id', $userId)->count();

        // Approved videos count
        $approvedVideosCount = Video::where('uploaded_by', $userId)->where('status', 'Approved')->count();

        // Pending videos count
        $pendingVideosCount = Video::where('uploaded_by', $userId)->where('status', 'Pending')->count();

        return view('cc.dashboard-cc', compact(
            'totalEarnings',
            'assignedReviewsCount',
            'approvedVideosCount',
            'pendingVideosCount'
        ));
    }
}
