<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?=base_url();?>/assets/js/custom.js"></script>
  <style type="text/css">
    .err_msg{
      color : red;
      padding: 5px 0;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-sm-offset-3 col-sm-6">
      <h2>Signup Form</h2>
      <p>The form below shows input elements with different heights using .input-lg and .input-sm:</p>
      <form id="signupForm" method = "post" action="<?=base_url()?>/register">
        <div class="form-group">
          <label for="name">Name <span class="text-danger">*</span></label>
          <input class="form-control" id="name" name = "name" type="text">
          <p class="err_msg"></p>
        </div>
        <div class="form-group">
          <label for="email">Email <span class="text-danger">*</span></label>
          <input class="form-control" id="email" name = "email" type="text">
          <p class="err_msg"></p>
        </div>
        <div class="form-group">
          <label for="password">Password <span class="text-danger">*</span></label>
          <input class="form-control" id="password" name = "password" type="password">
          <p class="err_msg"></p>
        </div>
        <div class="form-group">
          <label for="re_password">Re Enter Password <span class="text-danger">*</span></label>
          <input class="form-control" id="re_password" name = "re_password" type="password">
          <p class="err_msg"></p>
        </div>
        <div class="form-group">
          <label>Gender <span class="text-danger">*</span></label> <br/>
          <label  for="male_gender"><input id="male_gender" name = "gender" type="radio" value="male"> Male</label> | 
          <label  for="female_gender"><input id = "female_gender" name = "gender" type="radio" value="female"> Female</label>
          <p class="err_msg"></p>
        </div>
        <div class="form-group">
          <label for="occupation">Occupation <span class="text-danger">*</span></label>
          <select class="form-control" id="occupation" name = "occupation">
            <option value="">Select One</option>
            <option value="developer">Developer</option>
            <option value="web_desiger">Web Designer</option>
            <option value="graphics_designer">Graphics Designer</option>
            <option value="ui_ux_designer">UI/UX Designer</option>
            <option value="nodejs_developer">Node JS Developer</option>
          </select>
          <p class="err_msg"></p>
        </div>
        <div class="form-group">
          <label>Prefered Working From <span class="text-danger">*</span></label> <br/>
          <label  for="remote_work"><input id="remote_work" name = "prefered_working[]" type="checkbox" value="remote_work"> Remote</label> | 
          <label  for="office_work"><input id = "office_work" name = "prefered_working[]" type="checkbox" value="office_work"> Office</label>
          <p class="err_msg"></p>
        </div>
        <div class="text-danger serverValidateResp"></div>
        <div class="form-group">
          <button type="submit" class="form-control btn btn-sm btn-primary">Register</button>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>
