    {{-- <label>Customer Name </label> --}}
    <div class="form-group">
        <label for="name" class="me-3" >Name</label>
        <input class="{{ $errors->first('name')?'border border-danger':'null'}} form-control" type="text" name="name" placeholder="Customer Name" value="{{ $customer->name ? $customer->name : null }}" >
        <div>
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="me-3 mt-3" >Email</label>
        <input class="{{ $errors->first('email')?'border border-danger':'null'}} form-control" type="email" name="email" id="" placeholder="Email"  value="{{ $customer->email ? $customer->email : null }}" >
        <div>
            <span class="text-danger">{{ $errors->first('email') }}</span>
        </div>
    </div>
    <div class="form-group">
        <label for="active_user" class="mt-3">Status</label>
        <select name="active_user" id="active" class="{{ $errors->first('active_user')?'border border-danger':'null'}} form-select" value="{{ old('active_user') }}" >
            <option value="" selected disabled>
                Select Customer Status.
            </option>
            @foreach($customer->activeOptions() as $activeOptionKey => $activeOptionValue)
                <option value="{{$activeOptionKey}}" {{ $customer->active_user == $activeOptionValue ? 'selected' : '' }} >
                    {{$activeOptionValue}}
                </option>
            @endforeach

{{--            <option value="0" {{ $customer->active_user =='Inactive' ? 'selected' : '' }} >--}}
{{--                Inactive--}}
{{--            </option>--}}
        </select>
        <div>
            <span class="text-danger">{{ $errors->first('active_user') }}</span>
        </div>
    </div>
    <div class="form-group">
        <label for="company_id" class="mt-3">Company</label>
        <select name="company_id" id="company_id" class="{{ $errors->first('active_user')?'border border-danger':'null'}} form-select" value="{{ old('company_id') }}">
            <option value=""  selected disabled>Open this to select Company</option>

            @foreach($companies as $company)
            <option value="{{$company->id}}"{{$company->id == $customer->id ? 'selected': ''}}>{{ $company->name }}</option>
            @endforeach

        </select>
        <div>
            <span class="text-danger">{{ $errors->first('company_id') }}</span>
        </div>
    </div>
    <div class="form-group mt-3 d-flex flex-column">
        <label for="image">Profile Image</label>
            <input type="file" class="mt-1" name="image" alt="customer_image">
    </div>
{{--    <span class="test-danger">{{$errors->first('image')}}</span>--}}

    @csrf
