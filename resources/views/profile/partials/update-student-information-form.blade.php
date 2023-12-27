<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 action-title">
            {{ __('Student Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 action-title">
            {{ __("Update your age,mobile,country,webiste information") }}
        </p>
    </header>

    <form method="post" action="{{ route('student.profile.student-update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
<!-- start form -->
<div class="col-12 form-group">
                            <label  for="age">Age</label>
                            <input type="number" name="age" id="age" placeholder="Enter Your Age" class="form-control"  value="{{ (int)$user->age  ?? 9 }}" required>
</div>
<div class="col-12 form-group">
                            <label  for="phone">Mobile Number</label>
                            <input type="text" name="phone" id="phone" placeholder="Enter Mobile Number example : 0546035917" class="form-control"  value="{{ $user->phone }}" required>
</div>

                        <?php $websites =json_decode($user->website, true) ?>
                        @if(isset($websites))
                        @foreach($websites as $website)
                        <div class="col-12">
                                <div class="form-group">
                                    <label  for="website{{$loop->index + 1 }}">Website {{$loop->index +1}}</label>
                                    <input type="url" value="{{$website}}" name="website{{$loop->index +1}}" id="website{{$loop->index + 1}}" placeholder="Enter your Website" class="form-control" >
                                </div>
                            </div>
                        @endforeach
                        @else
                        <div class="col-12">
                                <div class="form-group">
                                    <label  for="website1">Website1</label>
                                    <input type="url"  name="website1" id="website1" placeholder="Enter your Website1" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label  for="website2">Website2</label>
                                    <input type="url"  name="website2" id="website2" placeholder="Enter your Website2" class="form-control" >
                                </div>
                            </div>                        
                        @endif
                        <!-- select country -->
                        <div class="col-12">
                                <div class="form-group">
                                    <label>Country</label>
                                    <select  name="country" class="form-control" required>
                                    <option value="ksa" {{$user->country == 'ksa' ? 'selected' : ''}}>Saudi Arabia</option>
                                        <option value="egypt" {{$user->country == 'egypt' ? 'selected' : ''}}>Egypt</option>
                                    </select>
                                </div>
                            </div>
                        <!-- select country -->

                        <!-- select gender -->
                        <div class="col-12">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select  name="gender" class="form-control" required>
                                    <option value="male" {{$user->gender == 'male' ? 'selected' : ''}}>Male</option>
                                        <option value="female" {{$user->gender == 'female' ? 'selected' : ''}}>Female</option>
                                    </select>
                                </div>
                            </div>
                        <!-- select country -->

                        <div class="col-md-12">
                                <div class="form-group">
                                    <label>Leave Message About Student</label>
                                    <textarea id="about" class="form-control" name="about" placeholder="Edit your comment here...">{{$user->about}}</textarea>
                                </div>
                        </div>
<!-- end form -->

        <div class="flex items-center gap-4 action-title">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 action-title"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>

    
</section>
