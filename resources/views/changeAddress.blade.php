@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <form method="POST" action="{{ route('change.address') }}" class="colorlib-form">
                @csrf
                @method('PUT')

                <h2>Update Address</h2>

                <div class="row">
                    <!-- Name -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $address->name) }}" placeholder="Your name">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Phone Number -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', $address->phone) }}" placeholder="Your phone number">
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Province -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="province">Province</label>
                            <input type="text" id="province" name="province" class="form-control" value="{{ old('province', $address->province) }}" placeholder="Your province">
                            @error('province')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- District -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="district">District</label>
                            <input type="text" id="district" name="district" class="form-control" value="{{ old('district', $address->district) }}" placeholder="Your district">
                            @error('district')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Subdistrict -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="subdistrict">Subdistrict</label>
                            <input type="text" id="subdistrict" name="subdistrict" class="form-control" value="{{ old('subdistrict', $address->subdistrict) }}" placeholder="Your subdistrict">
                            @error('subdistrict')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Postal Code -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="postal_code">Postal Code</label>
                            <input type="text" id="postal_code" name="postal_code" class="form-control" value="{{ old('postal_code', $address->postal_code) }}" placeholder="Your postal code">
                            @error('postal_code')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Full Address -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="full_address">Full Address</label>
                            <input type="text" id="full_address" name="full_address" class="form-control" value="{{ old('full_address', $address->full_address) }}" placeholder="Your full address">
                            @error('full_address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary btn-pulse">Update Address</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
