use App\Http\Controllers\CustomerController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('customers')->group(function () {
        Route::get('{id}', [CustomerController::class, 'show'])->name('customers.show');
        Route::patch('{id}', [CustomerController::class, 'update'])->name('customers.update');
        Route::delete('{id}', [CustomerController::class, 'delete'])->name('customers.delete');
        Route::post('export', [CustomerController::class, 'export'])->name('customers.export');
        Route::post('/', [CustomerController::class, 'create'])->name('customers.create');
        Route::get('/', [CustomerController::class, 'index'])->name('customers.index');

        Route::prefix('{customerId}/notes')->group(function () {
            Route::get('{id}', [NotesController::class, 'show'])->name('notes.show');
            Route::patch('{id}', [NotesController::class, 'update'])->name('notes.update');
            Route::delete('{id}', [NotesController::class, 'delete'])->name('notes.delete');
            Route::post('/', [NotesController::class, 'create'])->name('notes.create');
            Route::get('/', [NotesController::class, 'index'])->name('notes.index');
        });

        Route::post('{customerId}/projects', [ProjectController::class, 'createProject'])->name('projects.create');
    });
});

Route::post('users', [UserController::class, 'create'])->name('users.create');
