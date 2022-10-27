@extends('layouts.main')

@section('main-section')
<section>
    <div class="container my-5 py-5 border px-5">
        <h2 class="text-center">Edit Contact</h2>
        <form class="row g-3">
            <div class="col-md-4">
                <label for="firstName" class="form-label">First Name <span style="color: red;">*</span></label>
                <input type="text" class="form-control" id="firstName" name="first_name" placeholder="Enter First Name" value="{{ $contact->first_name }}"  />
                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="firstNameMessage" style="display: none;">
                    <span></span>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                </div>
            </div>
            <div class="col-md-4">
                <label for="lastName" class="form-label">Last Name <span style="color: red;">*</span></label>
                <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Enter Last Name" value="{{ $contact->last_name }}" />
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="lastNameMessage" style="display: none;">
                        <span></span>
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                    </div>
            </div>
            <div class="col-md-4">
                <label for="middleName" class="form-label">Middle Name (optional)</label>
                <input type="text" class="form-control" id="middleName" name="middle_name" placeholder="Enter Middle Name" value="{{ $contact->middle_name }}" />
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email <span style="color: red;">*</span></label>
                <input type="email" class="form-control" id="email" placeholder="Enter Email Address" onkeyup="checkEmail(event);" value="{{ $contact->email }}">
                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="emailMessage" style="display: none;">
                    <span></span>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                </div>
            </div>
            <div class="col-md-6">
                <label for="title" class="form-label">Title (optional)</label>
                <input type="text" class="form-control" id="title" placeholder="Enter Title" value="{{ $contact->title }}">
            </div>
            <div class="col-md-6">
                <label class="form-label" for="prefix">Prefix (optional)</label>
                <select class="form-select" id="prefix">
                    <option value="Mr" <?php echo $contact->prefix == 'Mr' ? 'selected' : '' ?>>Mr</option>
                    <option value="Mrs" <?php echo $contact->prefix == 'Mrs' ? 'selected' : '' ?>>Mrs</option>
                    <option value="Ms" <?php echo $contact->prefix == 'Ms' ? 'selected' : '' ?>>Ms</option>
                    <option value="Miss" <?php echo $contact->prefix == 'Miss' ? 'selected' : '' ?>>Miss</option>
                </select>
            </div>
            <div class="col-md-6">
            <label class="form-label" for="Suffix">Suffix (optional)</label>
                <select class="form-select" id="Suffix">
                    <option value="Jr" <?php echo $contact->Suffix == 'Jr' ? 'selected' : '' ?>>Jr</option>
                    <option value="Sr" <?php echo $contact->Suffix == 'Sr' ? 'selected' : '' ?>>Sr</option>
                    <option value="I" <?php echo $contact->Suffix == 'I' ? 'selected' : '' ?>>I</option>
                    <option value="II" <?php echo $contact->Suffix == 'II' ? 'selected' : '' ?>>II</option>
                    <option value="III" <?php echo $contact->Suffix == 'III' ? 'selected' : '' ?>>III</option>
                </select>
            </div>
            <div class="col-md-12 clonePhone">
                @foreach( $phone as $num )
                 @if( $loop->iteration == 1 )
                    <div class="row {{$loop->iteration}}" id="phoneNumber{{ $loop->iteration }}">
                        <div class="col-4">
                            <label for="phone" class="form-label">Phone Number <span style="color: red;">*</span></label>
                            <input type="number" class="form-control phoneNumber" placeholder="Enter Phone Number" name="phone" id="phoneNum" aria-describedby="button-addon1" value="{{$num->number}}" >
                        </div>
                        <div class="col-4">
                            <label for="phoneType" class="form-label">Phone Type <span style="color: red;">*</span></label>
                            <select class="form-select phoneType" id="phoneType">
                                <option value="Home" <?php echo $num->type == 'Home' ? 'selected' : '' ?>>Home</option>
                                <option value="Office" <?php echo $num->type == 'Office' ? 'selected' : '' ?>>Office</option>
                                <option value="Mobile" <?php echo $num->type == 'Mobile' ? 'selected' : '' ?>>Mobile</option>
                                <option value="Fax" <?php echo $num->type == 'Fax' ? 'selected' : '' ?>>Fax</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <div class="form-check mt-4">
                                <input class="form-check-input setDefault" type="radio" name="setDefault" id="phoneDefault{{$loop->iteration}}" value="{{$loop->iteration}}" <?php echo $num->is_default == 'Y' ? 'checked' : '' ?> >
                                <label class="form-check-label" for="phoneDefault{{$loop->iteration}}">
                                    Set Default
                                </label>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="row {{$loop->iteration}}" id="phoneNumber{{ $loop->iteration }}">
                        <div class="col-4">
                            <label for="phone" class="form-label">Phone Number <span style="color: red;">*</span></label>
                            <input type="number" class="form-control phoneNumber" placeholder="Enter Phone Number" name="phone" id="phoneNum" aria-describedby="button-addon1" value="{{$num->number}}" >
                        </div>
                        <div class="col-4">
                            <label for="phoneType" class="form-label">Phone Type <span style="color: red;">*</span></label>
                            <select class="form-select phoneType" id="phoneType">
                                <option value="Home" <?php echo $num->type == 'Home' ? 'selected' : '' ?>>Home</option>
                                <option value="Office" <?php echo $num->type == 'Office' ? 'selected' : '' ?>>Office</option>
                                <option value="Mobile" <?php echo $num->type == 'Mobile' ? 'selected' : '' ?>>Mobile</option>
                                <option value="Fax" <?php echo $num->type == 'Fax' ? 'selected' : '' ?>>Fax</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <div class="form-check mt-4">
                                <input class="form-check-input setDefault" type="radio" name="setDefault" id="phoneDefault{{$loop->iteration}}" value="{{$loop->iteration}}" <?php echo $num->is_default == 'Y' ? 'checked' : '' ?> >
                                <label class="form-check-label" for="phoneDefault{{$loop->iteration}}">
                                    Set Default
                                </label>
                            </div>
                        </div>
                        <div class="col-1">
                            <div>
                                <span class="btn btn-danger" onclick="removeNumber(event, {{$loop->iteration}})">Remove</span>
                            </div>
                        </div>
                    </div>
                 @endif
                @endforeach
            </div>
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="phoneMessage" style="display: none;">
                    <span></span>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                </div>
                <div class="text-end">
                    <span class="btn btn-primary" onclick="addMorePhone();">
                        Add More Phone Number
                    </span>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary w-100 mt-3" onclick="updateData(event, {{$contact->id}});">Submit</button>
            </div>
        </form>
    </div>
</section>
@endsection