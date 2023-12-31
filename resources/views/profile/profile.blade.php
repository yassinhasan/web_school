    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 profile-title">
                {{ __('Profile') }}
            </h2>
        </x-slot>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg info-wraper">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
                <!-- image upload -->
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg info-wraper">
                    <div class="max-w-xl">
                        <section>
                            <header>
                                <h2 class="text-lg font-medium text-gray-900 action-title">
                                    {{ __('Update Image') }}
                                </h2>
                                <p class="mt-1 text-sm text-gray-600 action-title">
                                    {{ __("Click on your image to update your profile picture.") }}
                                </p>
                            </header>
                            <form action="{{route('profile.updateImage')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="file" hidden name="image" id="addinputImage" class="user_image_input form-control @error('image') is-invalid @enderror" accept="image/jpeg, image/png, image/jpg">
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <div style="text-align: center;" class="image_wraper">
                                        <img class="user_image" src="{{ url('images/profile/users/'.$user->image) }}" style="max-width:100%">
                                    </div>
                                </div>
                                <x-primary-button class="update-image">Update</x-primary-button>
                            </form>
                        </section>
                    </div>
                </div>
                <!-- end image upload -->
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg info-wraper">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg info-wraper">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>





