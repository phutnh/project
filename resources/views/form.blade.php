@extends('layouts.app')
@section('content')
@include('layouts.shared.breadcrumb')
<section class="content">
  <div class="box box-primary no-margin-bottom">
    <div class="box-header with-border">
      <h3 class="box-title">Title</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="box-body">
      <form class="ws-validate">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Name</label>
                <input type="text" class="form-control" id="form[name]" name="form[name]" placeholder="Enter name" required data-errormessage='{"valueMissing": "Please enter your name adress.", "typeMismatch": "Your name is not correct."}'>
            </div>
            <div class="form-group">
              <label>Email address</label>
                <input type="email" class="form-control" id="form[email]" name="form[email]" placeholder="Enter email" required data-errormessage='{"valueMissing": "Please enter your email adress.", "typeMismatch": "Your email is not correct."}'>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" id="form[password]" name="form[password]" placeholder="Password" required pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
            </div>
            <div class="form-group">
              <label>Date</label>
              <input type="date" id="form[date]" name="form[date]" class="form-control" placeholder="from" />
            </div>
            <div class="form-group">
              <label>Date from</label>
              <input data-dependent-validation='{"from": "form[date-to]", "prop": "max"}' type="date" id="form[date-from]" name="form[date-from]" class="form-control" placeholder="from" />
            </div>
            <div class="form-group">
              <label>Date to</label>
              <input data-dependent-validation='{"from": "form[date-from]", "prop": "min"}' type="date" id="form[date-to]" name="form[date-to]" class="form-control" placeholder="to" />
            </div>
            <div class="form-group">
              <label>File input</label>
              <div class="input-group input-file" name="form[file]">
                <input type="text" class="form-control" placeholder='Choose a file...' required />
                <span class="input-group-btn">
                 <button class="btn btn-default btn-choose" type="button">Choose</button>
                </span>
              </div>
            </div>
            <div class="form-group">
              <label>Form group</label>
              <div class="input-group">
                <input type="text" class="form-control" required>
                <span class="input-group-addon">.00</span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="checkbox form-group">
              <label class="form-label">Gender</label>
              <div class="form-row">
                <label>
                  <input type="checkbox" required name="form[checkbox]" id="form[checkbox]"> 
                  <span class="mc-check"><i class="mc-check-icon glyphicon glyphicon-ok"></i></span>
                  Men
                </label>
                <label>
                  <input type="checkbox" required name="form[checkbox2]" id="form[checkbox2]">
                  <span class="mc-check"><i class="mc-check-icon glyphicon glyphicon-ok"></i></span>
                  Wonmen
                </label>
              </div>
            </div>
            <div class="form-group">
              <label>Choose radio</label>
                <input type="text" class="form-control" id="form[radiochoose]" name="form[radiochoose]" placeholder="required if checkbox is checked" data-dependent-validation='{"from": "form[checkbox]", "prop": "required"}'>
            </div>
            <div class="form-group radio">
              <label class="form-label">Radio</label>
              <div class="form-row">
                <label>
                  <input type="radio" required name="form[radio]">
                  <span class="mc-check"><i class="mc-check-icon glyphicon glyphicon-ok"></i></span>
                  Men
                </label>
                <label>
                  <input type="radio" required name="form[radio]">
                  <span class="mc-check"><i class="mc-check-icon glyphicon glyphicon-ok"></i></span>
                  Wonmen
                </label>
              </div>
            </div>
            <div class="form-group">
              <label>Select</label>
              <select class="form-control select2" id="form[select]" name="form[select]" required style="width: 100%;">
                <option value="">......</option>
                <option>option 1</option>
                <option>option 2</option>
                <option>option 3</option>
                <option>option 4</option>
                <option>option 5</option>
              </select>
            </div>
            <div class="form-group">
              <label>Textarea</label>
              <textarea class="form-control" id="form[textarea]" name="form[textarea]" rows="3" placeholder="Enter ..." required></textarea>
            </div>
          </div>
        </div>
        <div class="box-footer">
          <button type="reset" class="btn btn-default">Reset</button>
          <button type="submit" class="btn btn-cancel">Cancel</button>
          <button type="submit" class="btn btn-info">Submit</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection