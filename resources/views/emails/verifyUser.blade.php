<!DOCTYPE html>
<html>
  <head>
    <title>Welcome Letter</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

  </head>
  <body>
    <nav class="navbar">
      <div class="container-fluid" style="height: 30px; background-color: #28a745;">

      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
            <img src="{{ asset('images/logo.jpg') }}">
          </div>

          <div class="col-md-8">
            <p style="float: right;  margin-right: 50px;"><img src="{{ asset('images/phone.png') }}"> : 9836513953</p><br>
            <p style="float: right;"><img src="{{ asset('images/envelope.png') }}"> : info@rcdkadvisory.com</p>
            {{--<ul>--}}
              {{--<li style="float: right; list-style: none;"><i class="glyphicon glyphicon-phone-alt"></i> : 9836513953</li>--}}
              {{--<li style="float: right; list-style: none;"><i class="glyphicon glyphicon-envelope"></i> : info@rcdkadvisory.com</li>--}}
            {{--</ul>--}}
          </div>
        </div>
      </div>
    </nav>
    <h5>To,</h5>
    <h5>{{$employee['emp_first_name']}},</h5>
    <div class="row">
      <div class="col-md-6">
        <h5>{{$employee->address->present_town}}</h5>
      </div>
      <div class="col-md-6" style="text-align: right;">
        Date : {{ Carbon\Carbon::parse($employee->created_at)->format('d-m-Y') }}
      </div>
    </div>
    <br/>
    {{--Your registered email-id is {{$employee['emp_email']}} , Please click on the below link to verify your email account--}}
    <h5>Welcome to RCDK Advisory Services Private Limited! </h5>
    <br/>
    <p><span>RCDK Advisory Services Private Limited</span> is about more than assets growing strategies.  It’s about quality of life, richness of experience, setting goals and planning your dreams.  It is our objective to positively influence the financial future of our clients, to assist in establishing and designing an appropriate financial plan that is in alignment with their goals. We offer professional Portfolio Management Services (PMS) to HNIs who seek customized solutions to realize their investment goals. PMS is a customised offering, providing a range of investment options best suited for you in the current market scenario. Our Portfolio Managers are equipped to create an investment portfolio across various investment avenues to meet your unique needs.</p>
    <p>No financial planning is complete without insurance. At RCDK Advisory Services Private Limited, we intend to offer a level of solutions to our customers on their financial planning which includes life and general insurance. Besides this, we would be engaged in providing other financial services like Mutual Fund, SIP, Motor Insurance etc. Our engagement with customers would be through Tele-sales model backed up with Relationship Managers.</p>
    <p><span>RCDK Advisory Services Private Limited</span> has launched <span>E-Learning digital classroom software</span>. This software has endeavored to blend constructivist pedagogy, innovative learning techniques and advanced information and communication technologies to offer innovative, scalable and affordable solutions to the education community. New methods and techniques in the field of Education helps parents and students the process of learning. Learn and Ask things using new technologies like machine learning for Academics.</p>
    <p>At <span>RCDK Advisory Services Private Limited</span> we provide unbiased and independent advice, disciplined investment management and a commitment to exceptional service.  We strive to build client relationships for a lifetime. Often times, our clients become our friends and our friends become our clients.</p>
    <p>
      <span style="background-color: #ffe924;">You can have access to: </span>

      <ul>
      <li>	Reports on transactions </li>
      <li>	Monthly Bills </li>
      <li>	Clients Portfolio Reports </li>
      <li>	Renewals Alerts</li>
      <li>	Financial Assessment Tools  </li>
      <li>	SMS Facility & many more… </li>
      <li>	Training & Development </li>
    </ul>
    </p>
    <p style="background-color: #ffe924;">Please note that your unique code is {{ $employee->userActivation->user_activation_id }}. Kindly use this code for further interactions with us.</p>

    <p>With Warm Regards,</p>
    <h5>RCDK Advisory Services Pvt. Ltd.</h5>
    <h5>Kolkata</h5>

  <!--footer-->
    <br>
    <br>
    <br>

    <div class="container-fluid">
      <div class="row" style="height: 8px; background-color: #28a745"></div><br>
      <div class="row" style="height: 8px; background-color: #28a745"></div>
    </div>
  <h3 style="text-align: center;">RCDK Advisory Services Private Limited</h3>

  <p style="text-align: center;">Registered Office : Matrix Tower, 7th Floor, DN-24, Salt Lake, Sector V, Kolkata - 700091</p>
  <p style="text-align: center;">CIN : U74999WB2017PTC222220, PAN : AAICR4496E</p>


  </body>
</html>