<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\TimeEntryController;
use App\Http\Controllers\RegularizeRequestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\HolidaysController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\SalaryController;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Middleware\CheckRole;
use Spatie\Sitemap\SitemapGenerator;

Route::get('/sitemap.xml', function () {
    SitemapGenerator::create(config('app.url'))
        ->writeToFile(public_path('sitemap.xml'));
    
    return response()->file(public_path('sitemap.xml'));
});

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
         'metaTitle' => 'Home | QSSPL',
        'metaDescription' => 'Learn about QSSPL’s 25+ years of excellence in third-party inspections, testing, and certifications.',
    ]);
})->name('home');

Route::get('/about', function () {
    return Inertia::render('Home/About', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
         'metaTitle' => 'About | QSSPL',
        'metaDescription' => 'Learn about QSSPL’s 25+ years of excellence in third-party inspections, testing, and certifications.',
    ]);
})->name('about');
Route::get('/sector', function () {
    return Inertia::render('Home/Sector', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
         'metaTitle' => 'Sectors we serve in | QSSPL',
        'metaDescription' => 'QSSPL provides inspection, sampling, and testing services for power, mining, minerals, engineering, and consumer goods sectors',
    ]);
})->name('sector');
Route::get('/consumer-goods', function () {
    return Inertia::render('Home/Sectors/Consumer-goods', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
         'metaTitle' => 'Consumer Goods Sector| QSSPL',
        'metaDescription' => 'Learn about what are the services QSSPL provides in consumer goods sector',

    ]);
})->name('consumer-goods');
Route::get('/agriculture', function () {
    return Inertia::render('Home/Sectors/Agriculture', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
         'metaTitle' => 'Agriculture Sector | QSSPL',
        'metaDescription' => 'Learn about what are the services QSSPL provides in Agriculture  sector',

    ]);
})->name('agriculture');
Route::get('/engineering', function () {
    return Inertia::render('Home/Sectors/Engineering', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
          'metaTitle' => 'Engineering Sector | QSSPL',
        'metaDescription' => 'Learn about what are the services QSSPL provides in Engineering  sector',
    ]);
})->name('engineering');
Route::get('/hydrocarbons', function () {
    return Inertia::render('Home/Sectors/Hydrocarbons', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
         'metaTitle' => 'Hydrocarbons Sector | QSSPL',
        'metaDescription' => 'Learn about what are the services QSSPL provides in Hydrocarbons  sector',
    ]);
})->name('hydrocarbons');

Route::get('/laboratories', function () {
    return Inertia::render('Home/Sectors/Laboratories', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
         'metaTitle' => 'Laboratories Sector | QSSPL',
        'metaDescription' => 'Learn about what are the services QSSPL provides in Laboratories  sector',
    ]);
})->name('laboratories');
Route::get('/minerals', function () {
    return Inertia::render('Home/Sectors/Minerals', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
         'metaTitle' => 'Metals And Minerals Sector | QSSPL',
        'metaDescription' => 'Learn about what are the services QSSPL provides in Metals & Minerals  sector',
    ]);
})->name('minerals');
Route::get('/services', function () {
    return Inertia::render('Home/Services', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
         'metaTitle' => 'Services | QSSPL',
        'metaDescription' => 'Learn about what are the services QSSPL provides in Agriculture  sector',
    ]);
})->name('services');
Route::get('/locations', function () {
    return Inertia::render('Home/Locations', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
         'metaTitle' => 'Locations | QSSPL',
        'metaDescription' => 'Learn about what are the QSSPLs presence worldwide',
    ]);
})->name('locations');
Route::get('/background', function () {
    return Inertia::render('Home/Background', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
         'metaTitle' => 'Background | QSSPL',
        'metaDescription' => 'Learn about what are the background of QSSPL',
    ]);
})->name('background');
Route::get('/certificates', function () {
    return Inertia::render('Home/Certificates', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
         'metaTitle' => 'Certificates  | QSSPL',
        'metaDescription' => 'Learn about the certifications QSSPL has been validated with',
    ]);
})->name('certificates');
Route::get('/contact', function () {
    return Inertia::render('Home/Contact', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
         'metaTitle' => 'Contact | QSSPL',
        'metaDescription' => 'Contact Us ',
    ]);
})->name('contact');
Route::get('/career', function () {
    return Inertia::render('Home/Career', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
         'metaTitle' => 'Career | QSSPL',
        'metaDescription' => '',
    ]);
})->name('career');
Route::get('/management', function () {
    return Inertia::render('Home/Management', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
         'metaTitle' => 'Management | QSSPL',
        'metaDescription' => 'Learn about our experienced leaders',
    ]);
})->name('management');
Route::get('/mission', function () {
    return Inertia::render('Home/Mission', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
         'metaTitle' => 'Mission | QSSPL',
        'metaDescription' => 'Learn about our mission and purpose',
    ]);
})->name('mission');
Route::get('/vision', function () {
    return Inertia::render('Home/Vision', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
         'metaTitle' => 'vision | QSSPL',
        'metaDescription' => '',
    ]);
})->name('vision');

Route::get('/dashboard', function () {
    if (auth()->user()->hasRole('admin')) {
        return Inertia::render('AdminDashboard');
    } elseif (auth()->user()->hasRole('user')) {
        return Inertia::render('UserDashboard');
    }
    elseif (auth()->user()->hasRole('project admin')) {
        return Inertia::render('Dashboard');
    } else {
        return redirect('/')->with('error', 'Unauthorized. You do not have the necessary role.');
    }
})->middleware(['auth', 'verified', 'role:admin,user,project admin'])->name('dashboard');


Route::get('/projects', function () {
    if (auth()->user()->hasRole('admin')) {
        return Inertia::render('Projects');
    }
     else {
        return redirect('/')->with('error', 'Unauthorized. You do not have the necessary role.');
    }
})->middleware(['auth', 'verified', 'role:admin'])->name('projects');

Route::get('user/upload',[UserController::class,'showUploadForm'])->name('user.upload');
Route::post('/user/import', [UserController::class, 'import'])->name('user.import');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/attendancePage', [DemoController::class, 'index'])->name('attendance.page');
    Route::get('/leaves', [LeaveController::class,'index'])->name('leaves');
    Route::post('/leave/submit', [LeaveController::class,'submit'])->name('leave.submit');
    Route::get('/leave/history', [LeaveController::class,'history'])->name('leave.history');
   Route::get('/leave/requests',[LeaveController::class,'getRequests'])->name('leave.requests');
   Route::post('/leave/accept',[LeaveController::class,'acceptRequest'])->name('leave.accept');
   Route::post('/leave/reject',[LeaveController::class,'rejectRequest'])->name('leave.reject'); 
   Route::get('/leave/{date}',[LeaveController::class,'isLeaveApproved'])->name('leave.check');
    Route::get('/holidays', [HolidaysController::class,'index'])->name('holidays');
    Route::post('/holidays/add', [HolidaysController::class,'store'])->name('holidays.add');
    Route::get('/holidays/get', [HolidaysController::class,'getHoliday'])->name('holidays.get');
    Route::get('/birthdays',[UserController::class,'getNextEvents'])->name('birthdays.get');
    Route::get('/salary', [UserController::class,'salary'])->name('salary');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'viewAllUsers'])->name('admin.users.view');

Route::get('/test-mark-rest-days', function () {
    $timeEntryController = new TimeEntryController();
    $nextMonth = now()->startOfMonth(); // Get the first day of the next month
    return $timeEntryController->markRestDaysForMonth($nextMonth);
});
Route::get('/fix-rest-days', function () {
    $timeEntryController = new TimeEntryController();

    // Get the current year and month
    $currentYear = now()->year; // Current year
    $currentMonth = now()->month; // Current month

    // Call the fixRestDays method with the current year and month
    return $timeEntryController->fixRestDays($currentYear, $currentMonth);
});
    Route::post('/clock-in', [TimeEntryController::class,'clockIn'])->name('clock.in');
    Route::get('/clock-out', [TimeEntryController::class,'clockOut'])->name('clock.out');
    Route::get('/check-clock-in', [TimeEntryController::class,'checkClockIn'])->name('check.clock.in');
    Route::get('/attendance', [TimeEntryController::class,'attendance'])->name('attendance');
    Route::get('/attendance_by_month/user', [TimeEntryController::class,'getTimeEntriesByMonth'])->name('attendance.month');
    Route::post('/regularize/create',[RegularizeRequestController::class,'create'])->name('regularize.create');
    Route::get('/regularize',[RegularizeRequestController::class,'index'])->name('regularize.view');
    Route::get('/regularize/requests',[RegularizeRequestController::class,'getRequests'])->name('regularize.requests.view');
    Route::post('/regularize/accept',[RegularizeRequestController::class,'acceptRequest'])->name('regularize.accept');
    Route::post('/regularize/reject',[RegularizeRequestController::class,'rejectRequest'])->name('regularize.reject');
    Route::get('/user/{id}', [UserController::class, 'getUser'])->name('user.get');
});

Route::middleware(['auth', 'verified', 'role:admin,project admin'])->group(function () {
    Route::post('/admin/users/create/{project_id}/{area_id}', [UserController::class, 'store'])->name('admin.users.create');
    Route::post('/admin/users/role/update', [UserController::class, 'updateRole'])->name('admin.users.role.update');
    Route::post('/admin/users/delete/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::post('/admin/users/update', [UserController::class, 'update'])->name('admin.users.update');
    Route::post('/projects/add', [ProjectController::class, 'store'])->name('projects.add');
    Route::post('/area/add', [AreaController::class, 'store'])->name('area.add');
    Route::get('/projects/get', [ProjectController::class, 'index'])->name('projects.get');
    Route::post('/projects/update/{id}', [ProjectController::class, 'update'])->name('projects.update');
    Route::post('/area/update/{id}', [AreaController::class, 'update'])->name('area.update');
    Route::post('/projects/delete/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    Route::post('/area/delete/{id}', [AreaController::class, 'destroy'])->name('area.destroy');
    Route::get('/area/user/{id}', [AreaController::class, 'getUser'])->name('area.user');
    Route::get('/roles',[RoleController::class, 'index'])->name('roles.get');
    Route::get('/project/{id}',[ProjectController::class,'getProject'])->name('project.get');
    Route::get('/areas/{id}',[AreaController::class,'getAreas'])->name('areas.get');
    Route::post('/mark-rest',[TimeEntryController::class,'markRest'])->name('mark.rest');
Route::post('/attendance/delete',[TimeEntryController::class,'destroy'])->name('attendance.delete');
    Route::get('/profile/{id}', [ProfileController::class, 'updateUserProfile'])->name('profile.user.update');

    Route::get('/attendance_by_date/user', [TimeEntryController::class,'getTimeEntriesByDate'])->name('attendance.date');
    Route::post('/attendance_by_date/user', [TimeEntryController::class,'addTimeEntriesByDate'])->name('attendance.date.add');
    
    Route::post('/mark_rest', [TimeEntryController::class,'markRestForProjectUsers'])->name('markRest');
    Route::post('/generate-pdf', [PDFController::class, 'generatePDF']);
});
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::post('/admin/user/createNewPassword',[NewPasswordController::class,'CreateNewPassword']);
});

Route::middleware(['role:admin'])->group(function () {
    Route::get('/salary/upload', [SalaryController::class, 'uploadForm'])->name('admin.salary.upload.form');
Route::post('/salary/upload', [SalaryController::class, 'upload'])->name('salary.upload');

});
Route::get('/salary/list', [SalaryController::class, 'listSalaries']);
Route::post('/salary/slip', [SalaryController::class, 'downloadSalarySlip'])->name('salary.slip');

require __DIR__.'/auth.php';
