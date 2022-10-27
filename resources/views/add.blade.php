@extends('layouts.main')

@section('main-section')
<section>
    <div class="container my-5 py-5 border px-5">
        <h2 class="text-center">Add Contact</h2>
        <form class="row g-3">
            <div class="col-md-4">
                <label for="firstName" class="form-label">First Name <span style="color: red;">*</span></label>
                <input type="text" class="form-control" id="firstName" name="first_name" placeholder="Enter First Name"  />
                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="firstNameMessage" style="display: none;">
                    <span></span>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                </div>
            </div>
            <div class="col-md-4">
                <label for="lastName" class="form-label">Last Name <span style="color: red;">*</span></label>
                <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Enter Last Name"  />
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="lastNameMessage" style="display: none;">
                        <span></span>
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                    </div>
            </div>
            <div class="col-md-4">
                <label for="middleName" class="form-label">Middle Name (optional)</label>
                <input type="text" class="form-control" id="middleName" name="middle_name" placeholder="Enter Middle Name"  />
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email <span style="color: red;">*</span></label>
                <input type="email" class="form-control" id="email" placeholder="Enter Email Address" onkeyup="checkEmail(event);">
                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="emailMessage" style="display: none;">
                    <span></span>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                </div>
            </div>
            <div class="col-md-6">
                <label for="title" class="form-label">Title (optional)</label>
                <input type="text" class="form-control" id="title" placeholder="Enter Title">
            </div>
            <div class="col-md-6">
                <label class="form-label" for="prefix">Prefix (optional)</label>
                <select class="form-select" id="prefix">
                    <option value="Mr" selected>Mr</option>
                    <option value="Mrs">Mrs</option>
                    <option value="Ms">Ms</option>
                    <option value="Miss">Miss</option>
                </select>
            </div>
            <div class="col-md-6">
            <label class="form-label" for="Suffix">Suffix (optional)</label>
                <select class="form-select" id="Suffix">
                    <option value="Jr" selected>Jr</option>
                    <option value="Sr">Sr</option>
                    <option value="I">I</option>
                    <option value="II">II</option>
                    <option value="III">III</option>
                </select>
            </div>
            <div class="col-md-12 clonePhone">
                <div class="row 0" id="clonePhone">
                    <div class="col-4">
                        <label for="phone" class="form-label">Phone Number <span style="color: red;">*</span></label>
                        <input type="number" class="form-control phoneNumber" placeholder="Enter Phone Number" name="phone" id="phoneNum" aria-describedby="button-addon1">
                    </div>
                    <div class="col-4">
                        <label for="phoneType" class="form-label">Phone Type <span style="color: red;">*</span></label>
                        <select class="form-select phoneType" id="phoneType">
                            <option value="Home" selected>Home</option>
                            <option value="Office">Office</option>
                            <option value="Mobile">Mobile</option>
                            <option value="Fax">Fax</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <div class="form-check mt-4">
                            <input class="form-check-input setDefault" type="radio" name="setDefault" id="phoneDefault0" value="0" checked>
                            <label class="form-check-label" for="phoneDefault0">
                                Set Default
                            </label>
                        </div>
                    </div>
                </div>
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
                <button type="submit" class="btn btn-primary w-100 mt-3" onclick="saveContact(event);">Submit</button>
            </div>
        </form>
    </div>
</section>
@endsection