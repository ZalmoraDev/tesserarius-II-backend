<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Fortify\Contracts\PasskeyUser;
use Laravel\Fortify\PasskeyAuthenticatable;
use Laravel\Fortify\TwoFactorAuthenticatable;

/**
 * @property string $id UUID EA
 * @property string $username
 * @property string $firstName
 * @property string $lastName
 *
 * @property string $email
 * @property Carbon|null $email_verified_at
 *
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $two_factor_secret Chisel-2fa
 * @property string|null $two_factor_recovery_codes Chisel-2fa
 * @property Carbon|null $two_factor_confirmed_at Chisel-2fa
 *
 * @property Carbon|null $created_at EA
 * @property Carbon|null $updated_at EA
 * @property Carbon|null $deleted_at EA
 */
#[Fillable(['username', 'email', 'password'])]
#[Hidden(['password', 'two_factor_secret', 'two_factor_recovery_codes', 'remember_token'])]
class User extends Authenticatable implements PasskeyUser
{
    use HasFactory;
    use HasUuids, SoftDeletes;
    use Notifiable, PasskeyAuthenticatable, TwoFactorAuthenticatable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            /* @chisel-2fa */
            'two_factor_confirmed_at' => 'datetime',
            /* @end-chisel-2fa */
        ];
    }

    // TODO: Is the naming convention of these relations correct/logical?

    //#region One-Relations
    //#endregion One-Relations


    //#region Many-Relations
    /** User HasMany tasksCreated */
    public function tasksCreated(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    /** User HasMany projectsOwned */
    public function projectsOwned(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    /** User HasMany projectInvitesSent */
    public function projectInvitesSent(): HasMany
    {
        return $this->hasMany(ProjectInvite::class);
    }

    /** User BelongsToMany taskAssignees */
    public function taskAssignees(): BelongsToMany
    {
        return $this->belongsToMany(Task::class, 'task_assignees');
    }

    /** User BelongsToMany projectMembers */
    public function projectsMembers(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'project_members');
    }
    //#endregion Many-Relations
}
