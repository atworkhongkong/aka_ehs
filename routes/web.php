<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return redirect('/hss/meal');
});

// Added by Roland for adding Fortify auth
// Uncomment 'verified' middleware and Features::emailVerification() in config/Fortify.php if we want to enable email verification checking
// https://dev.to/jasminetracey/laravel-8-with-bootstrap-livewire-and-fortify-5d33
Route::middleware(['auth', /* 'verified' */ ])->group(function () {
    Route::view('home', 'home')->name('home');
});
// end setting basic auth

Route::prefix('hss')->group(function() {
    Route::get('/meal', [App\Http\Controllers\HSS\MealController::class, 'index'])->name('hss.meal.index');
    Route::get('/meal/create', [App\Http\Controllers\HSS\MealController::class, 'create'])->name('hss.meal.create');
    Route::get('/meal/edit', [App\Http\Controllers\HSS\MealController::class, 'edit'])->name('hss.meal.edit');
    Route::get('/meal/delivery', [App\Http\Controllers\HSS\MealController::class, 'mealDelivery'])->name('hss.meal.delivery');
    Route::get('/meal/delivery/print', [App\Http\Controllers\HSS\MealController::class, 'printMealDelivery'])->name('hss.meal.delivery.print');
    Route::get('/delivery_route', [App\Http\Controllers\HSS\DeliveryRouteController::class, 'index'])->name('hss.delivery_route.index');
    Route::get('/delivery_route/create', [App\Http\Controllers\HSS\DeliveryRouteController::class, 'create'])->name('hss.delivery_route.create');
    Route::get('/delivery_route/edit/{id}', [App\Http\Controllers\HSS\DeliveryRouteController::class, 'edit'])->name('hss.delivery_route.edit');

    Route::get('/care_worker', [App\Http\Controllers\HSS\CareWorkerController::class, 'index'])->name('hss.care_worker.index');
    Route::get('/care_worker/create', [App\Http\Controllers\HSS\CareWorkerController::class, 'create'])->name('hss.care_worker.create');
    Route::get('/care_worker/edit/{id}', [App\Http\Controllers\HSS\CareWorkerController::class, 'edit'])->name('hss.care_worker.edit');

    Route::get('/duty_roster', [App\Http\Controllers\HSS\DutyRosterController::class, 'index'])->name('hss.duty_roster.index');

    Route::get('/case', [App\Http\Controllers\HSS\CaseController::class, 'index'])->name('ecs.case.index');
    Route::get('/case/create', [App\Http\Controllers\HSS\CaseController::class, 'create'])->name('ecs.case.create');
    Route::get('/case/{case_id}/edit', [App\Http\Controllers\HSS\CaseController::class, 'edit'])->name('ecs.case.edit');
    Route::get('/case/{case_id}/assessment', [App\Http\Controllers\HSS\CaseAssessmentController::class, 'index'])->name('ecs.case_assessment.index');
    Route::get('/case/{case_id}/reassessment', [App\Http\Controllers\HSS\CaseReassessmentController::class, 'index'])->name('ecs.case_reassessment.index');
    Route::get('/case/{case_id}/recording', [App\Http\Controllers\HSS\CaseRecordingController::class, 'index'])->name('ecs.case_recording.index');

    //Route::get('/case_assessment/create', [App\Http\Controllers\HSS\CaseAssessmentController::class, 'create'])->name('ecs.case_assessment.create');
    Route::get('/case_assessment/{case_id}/edit', [App\Http\Controllers\HSS\CaseAssessmentController::class, 'edit'])->name('ecs.case_assessment.edit');

    Route::get('/case_reassessment/create', [App\Http\Controllers\HSS\CaseReassessmentController::class, 'create'])->name('ecs.case_reassessment.create');
    Route::get('/case_reassessment/{reassessment_id}/edit', [App\Http\Controllers\HSS\CaseReassessmentController::class, 'edit'])->name('ecs.case_reassessment.edit');

    Route::get('/case_recording/create', [App\Http\Controllers\HSS\CaseRecordingController::class, 'create'])->name('ecs.case_recording.create');
    Route::get('/case_recording/{recording_id}/edit', [App\Http\Controllers\HSS\CaseRecordingController::class, 'edit'])->name('ecs.case_recording.edit');

    Route::get('/finance/fee', [App\Http\Controllers\HSS\FinanceController::class, 'fee'])->name('ecs.finance.fee');
    Route::get('/finance/income', [App\Http\Controllers\HSS\FinanceController::class, 'income'])->name('ecs.finance.income');
    Route::get('/finance/invoice', [App\Http\Controllers\HSS\FinanceController::class, 'invoice'])->name('ecs.finance.invoice');
    Route::get('/finance/meal', [App\Http\Controllers\HSS\FinanceController::class, 'meal'])->name('ecs.finance.meal');
    Route::get('/finance/service', [App\Http\Controllers\HSS\FinanceController::class, 'service'])->name('ecs.finance.service');
});

Route::prefix('ecs')->group(function() {
    Route::get('/programme', [App\Http\Controllers\ECS\ProgrammeController::class, 'index'])->name('ecs.programme.index');
    Route::get('/programme/create', [App\Http\Controllers\ECS\ProgrammeController::class, 'create'])->name('ecs.programme.create');
    Route::get('/programme/{id}/edit', [App\Http\Controllers\ECS\ProgrammeController::class, 'edit'])->name('ecs.programme.edit');
    Route::get('/programme/{programme_id}/register', [App\Http\Controllers\ECS\ProgrammeController::class, 'register'])->name('ecs.programme.register');
    Route::get('/programme/{programme_id}/attendance', [App\Http\Controllers\ECS\ProgrammeController::class, 'attendance'])->name('ecs.programme.attendance');
    Route::get('/programme/{programme_id}/waiting_list', [App\Http\Controllers\ECS\ProgrammeController::class, 'waitingList'])->name('ecs.programme.waiting_list');
    Route::get('/programme/{programme_id}/tutor_salary', [App\Http\Controllers\ECS\ProgrammeController::class, 'tutorSalary'])->name('ecs.programme.tutor_salary');

    //Route::get('/programme/register', [App\Http\Controllers\ECS\ProgrammeController::class, 'register'])->name('ecs.programme.register');
    //Route::get('/programme/waiting_list', [App\Http\Controllers\ECS\ProgrammeController::class, 'waitingList'])->name('ecs.programme.waiting_list');

    Route::get('/programme_register/{id}', [App\Http\Controllers\ECS\ProgrammeRegisterController::class, 'show'])->where('id', '[0-9]+')->name('ecs.programme_register.show');
    Route::get('/programme_register/create', [App\Http\Controllers\ECS\ProgrammeRegisterController::class, 'create'])->name('ecs.programme_register.create');
    Route::get('/programme_register/create_multiple', [App\Http\Controllers\ECS\ProgrammeRegisterController::class, 'createMultiple'])->name('ecs.programme_register.create_multiple');
    Route::get('/programme_register/cancel', [App\Http\Controllers\ECS\ProgrammeRegisterController::class, 'cancel'])->name('ecs.programme_register.cancel');
    Route::get('/programme_register/report', [App\Http\Controllers\ECS\ProgrammeRegisterController::class, 'report'])->name('ecs.programme_register.report');
    Route::get('/programme_register/balance', [App\Http\Controllers\ECS\ProgrammeRegisterController::class, 'balance'])->name('ecs.programme_register.balance');
    Route::get('/programme_register/balance_done', [App\Http\Controllers\ECS\ProgrammeRegisterController::class, 'balanceDone'])->name('ecs.programme_register.balance_done');
    Route::get('/programme_register/export', [App\Http\Controllers\ECS\ProgrammeRegisterController::class, 'export'])->name('ecs.programme_register.export');

    Route::get('/programme_attendance/{programme_id}/create', [App\Http\Controllers\ECS\ProgrammeAttendanceController::class, 'create'])->where('id', '[0-9]+')->name('ecs.programme_attendance.create');
    Route::get('/programme_attendance/{attendance_id}/edit', [App\Http\Controllers\ECS\ProgrammeAttendanceController::class, 'edit'])->where('attendance_id', '[0-9]+')->name('ecs.programme_attendance.edit');
    Route::get('/programme_attendance/{programme_id}', [App\Http\Controllers\ECS\ProgrammeAttendanceController::class, 'index'])->where('id', '[0-9]+')->name('ecs.programme_attendance.index');
    Route::get('/programme_attendance/{programme_id}/print_attendance', [App\Http\Controllers\ECS\ProgrammeAttendanceController::class, 'printAttendance'])->where('id', '[0-9]+')->name('ecs.programme_attendance.print_attendance');

    Route::get('/programme_waiting_list/{programme_id}/create', [App\Http\Controllers\ECS\ProgrammeWaitingListController::class, 'create'])->where('programme_id', '[0-9]+')->name('ecs.programme_waiting_list.create');
    Route::get('/programme_waiting_list/{programme_id}/draw', [App\Http\Controllers\ECS\ProgrammeWaitingListController::class, 'draw'])->where('programme_id', '[0-9]+')->name('ecs.programme_waiting_list.draw');
    Route::get('/programme_waiting_list/{waiting_id}/edit', [App\Http\Controllers\ECS\ProgrammeWaitingListController::class, 'edit'])->where('waiting_id', '[0-9]+')->name('ecs.programme_waiting_list.edit');
    Route::get('/programme_waiting_list/{id}', [App\Http\Controllers\ECS\ProgrammeWaitingListController::class, 'index'])->where('id', '[0-9]+')->name('ecs.programme_waiting_list.index');

    Route::get('/programme_tutor_salary/{programme_id}/create', [App\Http\Controllers\ECS\ProgrammeTutorSalaryController::class, 'create'])->where('programme_id', '[0-9]+')->name('ecs.programme_tutor_salary.create');
    Route::get('/programme_tutor_salary/{salary_id}/edit', [App\Http\Controllers\ECS\ProgrammeTutorSalaryController::class, 'edit'])->where('salary_id', '[0-9]+')->name('ecs.programme_tutor_salary.edit');
    Route::get('/programme_tutor_salary/{salary_id}/contrast', [App\Http\Controllers\ECS\ProgrammeTutorSalaryController::class, 'contrast'])->where('salary_id', '[0-9]+')->name('ecs.programme_tutor_salary.contrast');

    Route::post('/invoice', [App\Http\Controllers\ECS\InvoiceController::class, 'search'])->name('ecs.invoice.search');
    Route::get('/invoice/{invoice_id}', [App\Http\Controllers\ECS\InvoiceController::class, 'show'])->name('ecs.invoice.show');

    // meal
    Route::get('/meal_setting', [App\Http\Controllers\ECS\MealSettingController::class, 'index'])->name('ecs.meal_setting.index');

    Route::get('/meal', [App\Http\Controllers\ECS\MealController::class, 'index'])->name('ecs.meal.index');
    Route::get('/meal/create', [App\Http\Controllers\ECS\MealController::class, 'create'])->name('ecs.meal.create');
    Route::get('/meal/{id}/edit', [App\Http\Controllers\ECS\MealController::class, 'edit'])->where('id', '[0-9]+')->name('ecs.meal.edit');

    Route::get('/order_meal', [App\Http\Controllers\ECS\OrderMealController::class, 'index'])->name('ecs.order_meal.index');
    Route::get('/order_meal/create', [App\Http\Controllers\ECS\OrderMealController::class, 'create'])->name('ecs.order_meal.create');
    Route::get('/order_meal/{order_id}/edit', [App\Http\Controllers\ECS\OrderMealController::class, 'edit'])->name('ecs.order_meal.edit');
    Route::get('/order_meal/report', [App\Http\Controllers\ECS\OrderMealController::class, 'report'])->name('ecs.order_meal.report');
    Route::get('/order_meal/export', [App\Http\Controllers\ECS\OrderMealController::class, 'export'])->name('ecs.order_meal.export');

    Route::get('/volunteer', [App\Http\Controllers\ECS\VolunteerController::class, 'index'])->name('ecs.volunteer.index');
    Route::get('/volunteer/create', [App\Http\Controllers\ECS\VolunteerController::class, 'create'])->name('ecs.volunteer.create');
    Route::get('/volunteer/{id}/edit', [App\Http\Controllers\ECS\VolunteerController::class, 'edit'])->name('ecs.volunteer.edit');
    Route::get('/volunteer/report', [App\Http\Controllers\ECS\VolunteerController::class, 'report'])->name('ecs.volunteer.report');

    Route::get('/volunteer_team', [App\Http\Controllers\ECS\VolunteerTeamController::class, 'index'])->name('ecs.volunteer_team.index');
    Route::get('/volunteer_team/create', [App\Http\Controllers\ECS\VolunteerTeamController::class, 'create'])->name('ecs.volunteer_team.create');
    Route::get('/volunteer_team/{id}/edit', [App\Http\Controllers\ECS\VolunteerTeamController::class, 'edit'])->name('ecs.volunteer_team.edit');

    Route::get('/volunteer_service', [App\Http\Controllers\ECS\VolunteerServiceController::class, 'index'])->name('ecs.volunteer_service.index');
    Route::get('/volunteer_service/create', [App\Http\Controllers\ECS\VolunteerServiceController::class, 'create'])->name('ecs.volunteer_service.create');
    Route::get('/volunteer_service/{id}/edit', [App\Http\Controllers\ECS\VolunteerServiceController::class, 'edit'])->name('ecs.volunteer_service.edit');
    Route::get('/volunteer_service/report', [App\Http\Controllers\ECS\VolunteerServiceController::class, 'report'])->name('ecs.volunteer_service.report');

    Route::get('/carer', [App\Http\Controllers\ECS\CarerController::class, 'index'])->name('ecs.carer.index');
    Route::get('/carer/create', [App\Http\Controllers\ECS\CarerController::class, 'create'])->name('ecs.carer.create');
    Route::get('/carer/{id}/edit', [App\Http\Controllers\ECS\CarerController::class, 'edit'])->name('ecs.carer.edit');
    Route::get('/carer/report', [App\Http\Controllers\ECS\CarerController::class, 'report'])->name('ecs.carer.report');

    Route::get('/carer_service', [App\Http\Controllers\ECS\CarerServiceController::class, 'index'])->name('ecs.carer_service.index');
    Route::get('/carer_service/create', [App\Http\Controllers\ECS\CarerServiceController::class, 'create'])->name('ecs.carer_service.create');
    Route::get('/carer_service/{id}/edit', [App\Http\Controllers\ECS\CarerServiceController::class, 'edit'])->name('ecs.carer_service.edit');
    Route::get('/carer_service/report', [App\Http\Controllers\ECS\CarerServiceController::class, 'report'])->name('ecs.carer_service.report');

    Route::get('/hidden_elderly', [App\Http\Controllers\ECS\HiddenElderlyController::class, 'index'])->name('ecs.hidden_elderly.index');
    Route::get('/hidden_elderly/create', [App\Http\Controllers\ECS\HiddenElderlyController::class, 'create'])->name('ecs.hidden_elderly.create');
    Route::get('/hidden_elderly/{id}/edit', [App\Http\Controllers\ECS\HiddenElderlyController::class, 'edit'])->name('ecs.hidden_elderly.edit');
    Route::get('/hidden_elderly/report', [App\Http\Controllers\ECS\HiddenElderlyController::class, 'report'])->name('ecs.hidden_elderly.report');

    Route::get('/tutor', [App\Http\Controllers\ECS\TutorController::class, 'index'])->name('ecs.tutor.index');
    Route::get('/tutor/create', [App\Http\Controllers\ECS\TutorController::class, 'create'])->name('ecs.tutor.create');
    Route::get('/tutor/{tutor_id}/edit', [App\Http\Controllers\ECS\TutorController::class, 'edit'])->name('ecs.tutor.edit');
    Route::get('/tutor/{tutor_id}/programme', [App\Http\Controllers\ECS\TutorController::class, 'programme'])->name('ecs.tutor.programme');

    Route::get('/report/transaction', [App\Http\Controllers\ECS\ReportController::class, 'transaction'])->name('ecs.report.transaction');
    Route::get('/report/activity_income', [App\Http\Controllers\ECS\ReportController::class, 'activityIncome'])->name('ecs.report.activity_income');
    Route::get('/report/invoice', [App\Http\Controllers\ECS\ReportController::class, 'invoice'])->name('ecs.report.invoice');
    Route::get('/report/daily_income', [App\Http\Controllers\ECS\ReportController::class, 'dailyIncome'])->name('ecs.report.daily_income');

    Route::get('/meal_ingredient', [App\Http\Controllers\ECS\MealIngredientController::class, 'index'])->name('ecs.meal_ingredient.index');
    Route::get('/meal_ingredient/create', [App\Http\Controllers\ECS\MealIngredientController::class, 'create'])->name('ecs.meal_ingredient.create');
    Route::get('/meal_ingredient/{ingredient_id}/edit', [App\Http\Controllers\ECS\MealIngredientController::class, 'edit'])->name('ecs.meal_ingredient.edit');
    Route::get('/meal_ingredient/{ingredient_id}/log', [App\Http\Controllers\ECS\MealIngredientController::class, 'log'])->name('ecs.meal_ingredient.log');

    Route::get('/product', [App\Http\Controllers\ECS\ProductController::class, 'index'])->name('ecs.product.index');
    Route::get('/product/create', [App\Http\Controllers\ECS\ProductController::class, 'create'])->name('ecs.product.create');
    Route::get('/product/{product_id}/edit', [App\Http\Controllers\ECS\ProductController::class, 'edit'])->name('ecs.product.edit');
    Route::get('/product/{product_id}/log', [App\Http\Controllers\ECS\ProductController::class, 'log'])->name('ecs.product.log');

    Route::get('/purchase', [App\Http\Controllers\ECS\PurchaseController::class, 'index'])->name('ecs.purchase.index');
    Route::get('/purchase/create', [App\Http\Controllers\ECS\PurchaseController::class, 'create'])->name('ecs.purchase.create');
    Route::get('/purchase/{purchase_id}/edit', [App\Http\Controllers\ECS\PurchaseController::class, 'edit'])->name('ecs.purchase.edit');

    Route::get('/equipment', [App\Http\Controllers\ECS\EquipmentController::class, 'index'])->name('ecs.equipment.index');
    Route::get('/equipment/create', [App\Http\Controllers\ECS\EquipmentController::class, 'create'])->name('ecs.equipment.create');
    Route::get('/equipment/{equipment_id}/edit', [App\Http\Controllers\ECS\EquipmentController::class, 'edit'])->name('ecs.equipment.edit');
    Route::get('/equipment/{equipment_id}/log', [App\Http\Controllers\ECS\EquipmentController::class, 'log'])->name('ecs.equipment.log');

    Route::get('/equipment_rental', [App\Http\Controllers\ECS\EquipmentRentalController::class, 'index'])->name('ecs.equipment_rental.index');
    Route::get('/equipment_rental/create', [App\Http\Controllers\ECS\EquipmentRentalController::class, 'create'])->name('ecs.equipment_rental.create');
    Route::get('/equipment_rental/{rental_id}/edit', [App\Http\Controllers\ECS\EquipmentRentalController::class, 'edit'])->name('ecs.equipment_rental.edit');
    Route::get('/equipment_rental/report', [App\Http\Controllers\ECS\EquipmentRentalController::class, 'report'])->name('ecs.equipment_rental.report');

    Route::get('/room', [App\Http\Controllers\ECS\RoomController::class, 'index'])->name('ecs.room.index');
    Route::get('/room/create', [App\Http\Controllers\ECS\RoomController::class, 'create'])->name('ecs.room.create');
    Route::get('/room/{room_id}/edit', [App\Http\Controllers\ECS\RoomController::class, 'edit'])->name('ecs.room.edit');

    Route::get('/room_booking', [App\Http\Controllers\ECS\RoomBookingController::class, 'index'])->name('ecs.room_booking.index');
    Route::get('/room_booking/calendar', [App\Http\Controllers\ECS\RoomBookingController::class, 'calendar'])->name('ecs.room_booking.calendar');
    Route::get('/room_booking/create', [App\Http\Controllers\ECS\RoomBookingController::class, 'create'])->name('ecs.room_booking.create');
    Route::get('/room_booking/{booking_id}/edit', [App\Http\Controllers\ECS\RoomBookingController::class, 'edit'])->name('ecs.room_booking.edit');

    Route::get('/holiday', [App\Http\Controllers\ECS\HolidayController::class, 'index'])->name('ecs.holiday.index');
    Route::get('/holiday/create', [App\Http\Controllers\ECS\HolidayController::class, 'create'])->name('ecs.holiday.create');
    Route::get('/holiday/{id}/edit', [App\Http\Controllers\ECS\HolidayController::class, 'edit'])->name('ecs.holiday.edit');

    Route::get('/dcss', [App\Http\Controllers\ECS\DCSSController::class, 'index'])->name('ecs.dcss.index');
    Route::get('/dcss/create', [App\Http\Controllers\ECS\DCSSController::class, 'create'])->name('ecs.dcss.create');
    Route::get('/dcss/{case_id}/edit', [App\Http\Controllers\ECS\DCSSController::class, 'edit'])->name('ecs.dcss.edit');
    Route::get('/dcss/report', [App\Http\Controllers\ECS\DCSSController::class, 'report'])->name('ecs.dcss.report');

    Route::get('/dcss_staff', [App\Http\Controllers\ECS\DCSSStaffController::class, 'index'])->name('ecs.dcss_staff.index');
    Route::get('/dcss_staff/create', [App\Http\Controllers\ECS\DCSSStaffController::class, 'create'])->name('ecs.dcss_staff.create');
    Route::get('/dcss_staff/{staff_id}/edit', [App\Http\Controllers\ECS\DCSSStaffController::class, 'edit'])->name('ecs.dcss_staff.edit');

    Route::get('/dcss_staff_training', [App\Http\Controllers\ECS\DCSSStaffTrainingController::class, 'index'])->name('ecs.dcss_staff_training.index');
    Route::get('/dcss_staff_training/create', [App\Http\Controllers\ECS\DCSSStaffTrainingController::class, 'create'])->name('ecs.dcss_staff_training.create');
    Route::get('/dcss_staff_training/{staff_id}/edit', [App\Http\Controllers\ECS\DCSSStaffTrainingController::class, 'edit'])->name('ecs.dcss_staff_training.edit');
    Route::get('/dcss_staff_training/report', [App\Http\Controllers\ECS\DCSSStaffTrainingController::class, 'report'])->name('ecs.dcss_training.report');

    Route::get('/dcss_training', [App\Http\Controllers\ECS\DCSSTrainingController::class, 'index'])->name('ecs.dcss_training.index');
    Route::get('/dcss_training/create', [App\Http\Controllers\ECS\DCSSTrainingController::class, 'create'])->name('ecs.dcss_training.create');
    Route::get('/dcss_training/report', [App\Http\Controllers\ECS\DCSSTrainingController::class, 'report'])->name('ecs.dcss_training.report');
    Route::get('/dcss_training/{case_id}', [App\Http\Controllers\ECS\DCSSTrainingController::class, 'show'])->name('ecs.dcss_training.show');
    Route::get('/dcss_training/{case_id}/edit', [App\Http\Controllers\ECS\DCSSTrainingController::class, 'edit'])->name('ecs.dcss_training.edit');
    Route::get('/dcss_training/{case_id}/edit_icp', [App\Http\Controllers\ECS\DCSSTrainingController::class, 'edit_icp'])->name('ecs.dcss_training.edit_icp');

    Route::get('vital_sign', [App\Http\Controllers\ECS\VitalSignController::class, 'index'])->name('ecs.vital_sign.index');
    Route::get('vital_sign/create', [App\Http\Controllers\ECS\VitalSignController::class, 'create'])->name('ecs.vital_sign.create');
    Route::get('vital_sign/{id}/edit', [App\Http\Controllers\ECS\VitalSignController::class, 'edit'])->name('ecs.vital_sign.edit');
});
