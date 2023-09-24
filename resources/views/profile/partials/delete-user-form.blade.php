<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 action-title">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 action-title">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger text-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Delete Account
    </button>

</section>


<!-- modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                <form method="post" action="{{ route('profile.destroy') }}" class="p-6 form-delete">
                    @csrf
                    @method('delete')

                    <h2 class="text-lg font-medium text-gray-900 action-title">
                        {{ __('Are you sure you want to delete your account?') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600 action-title">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                    </p>

                    <div class="mt-6">
                        <x-input-label for="password" value="{{ __('Password') }}" class="sr-only action-title" />

                        <x-text-input id="password" name="password" type="password" class="mt-1 block w-3/4 action-title" placeholder="{{ __('Password') }}" />

                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                    </div>

                    <div class="mt-6 flex justify-end action-title">
                       <button type="button" class="btn btn-secondary text-dark" data-bs-dismiss="modal">Cancel</button>


                        <x-danger-button class="ml-3 action-title delete-btn">
                            {{ __('Delete Account') }}
                        </x-danger-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- modal -->