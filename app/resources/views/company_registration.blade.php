@extends('layouts.main')
@section('content')
    <div class="container-xxl my-md-3 bd-layout">
        <div class="row justify-content-md-center">
            <h3>New Company</h3>
            <form>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control" >
                </div>
                <div class="mb-3">
                    <label for="business_sector" class="form-label">Business Sector</label>
                    <select id="business_sector" name="business_sector" class="form-control">
                        @foreach($businessSectors as $businessSector)
                            <option value="{{ $businessSector->id }}">{{ $businessSector->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="countries" class="form-label">Country</label>
                    <select id="countries" name="countries" class="form-control">
                        <option value="na">Select</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="states" class="form-label">State</label>
                    <select id="states" name="states" class="form-control">
                        <option value="na">Select</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" id="city" name="city" class="form-control" >
                </div>
                <div class="mb-3">
                    <label for="website" class="form-label">Website Url</label>
                    <input type="text" id="website" name="website" class="form-control" >
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

@section('style')
@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#countries').change(function () {
                var val = $(this).val();
                if (val === 'na') {
                    return;
                }

                console.log(val);
            });
        });
    </script>
@endsection



