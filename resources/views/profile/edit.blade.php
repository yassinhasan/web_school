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
                    <form action="{{route('profile.updateImage')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <label class="form-label" for="addinputImage">Image:</label>
                     <input type="file"  hidden name="image" id="addinputImage" class="user_image_input form-control @error('image') is-invalid @enderror" accept="image/jpeg, image/png, image/jpg">
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <hr>
                        <hr>
                        <div style="text-align: center;" class="image_wraper">
                        <img class="user_image" src="{{ url('images/profile/users/'.$user->image) }}" style="max-width:100%">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info update-image-btn text-light" style="background-color: #212529;">{{ __('Update') }}</button>
                    </form>
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