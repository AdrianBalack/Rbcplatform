<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;
use Livewire\WithPagination;
use App\Models\User;

new class extends Component
{
    use WithPagination;

    public string $password = '';


    public string $search = '';
    public string $sortField = 'name';
    public string $sortDirection = 'asc';
    public string $filter = '';
    public int $perPage = 15;

       // 'filter' => ['except' => ''],
    protected $queryString = [
        'search' => ['except' => ''],
        'sortField' => ['except' => 'name'],
        'sortDirection' => ['except' => 'asc'],
        'perPage' => ['except' => 15],
    ];


    public function with(): array
    {
           // ->when($this->filter, function($query) {
            //    $query->where('is_creator', $this->filter);
            //})
        return [
            'users' => User::query()
            ->when($this->search, function($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage)
        ];
    }
    
    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }
    
    /**
     * Delete the currently authenticated user.
     */
    public function deleteUser(Logout $logout): void
    {
        $this->validate([
            'password' => ['required', 'string', 'current_password'],
        ]);

        tap(Auth::user(), $logout(...))->delete();

        $this->redirect('/', navigate: true);
    }
}; ?>

    <div class="py-12" >
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        

    <div >
        <div class="flex justify-between mb-4">
            <div>
                <input type="text" placeholder="Search..." class="px-4 py-2 border" wire:model="search">
            </div>
            {{-- <div>
                <select wire:model="filter" class="px-4 py-2 border">
                    <option value="">All Statuses</option>
                    <option value="active">Active</option>
                    <option value="completed">Completed</option>
                    <option value="canceled">Canceled</option>
                </select>
            </div> --}}
        </div>

        <table class="min-w-full bg-white dark:bg-gray-800">
            <thead>
                <tr>
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2 cursor-pointer" wire:click="sortBy('name')">Name
                        @if ($sortField === 'name')
                            @if ($sortDirection === 'asc') ↑ @else ↓ @endif
                        @endif
                    </th>
                    <th class="px-4 py-2 cursor-pointer" wire:click="sortBy('email')">Email
                        @if ($sortField === 'email')
                            @if ($sortDirection === 'asc') ↑ @else ↓ @endif
                        @endif
                    </th>
                    <th class="px-4 py-2 cursor-pointer" wire:click="sortBy('is_creator')">Is Creator
                        @if ($sortField === 'is_creator')
                            @if ($sortDirection === 'asc') ↑ @else ↓ @endif
                        @endif
                    </th>
                    <th class="px-4 py-2">Email Verified At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                    <tr class="dark:text-white dark:bg-gray-700">
                        <td class="px-4 py-2 border">{{ $users->firstItem() + $index }}</td>
                        <td class="px-4 py-2 border">{{ $user->name }}</td>
                        <td class="px-4 py-2 border">{{ $user->email }}</td>
                        <td class="px-4 py-2 border">{{ $user->is_creator }}</td>
                        <td class="px-4 py-2 border">{{ $user->email_verified_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>



                    
                </div>
            </div>
        </div>
    </div>
