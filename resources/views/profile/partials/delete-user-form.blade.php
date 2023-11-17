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

    <x-danger-button  data-toggle="modal" data-target="#deleteModal"> Delete Account</x-primary-button>


</section>


<!-- modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true" data-backdrop="static" data-keyboard="false" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content delete-form">
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
                        <x-input-label for="password2" value="{{ __('Password') }}" class="sr-only action-title" />

                        <x-text-input id="password2" name="password" type="password" class="mt-1 block w-3/4 action-title" placeholder="{{ __('Password') }}"  autocomplete />

                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                    </div>

                    <div class="mt-6 flex justify-end action-title">
                       <button type="button" class="btn btn-secondary  cancel-btn" data-dismiss="modal">Cancel</button>


                        <x-danger-button class="ml-3 delete-btn">
                            {{ __('Delete Account') }}
                        </x-danger-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- modal -->