<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
<header>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container">
      <a href="" class="navbar-brand">DASHBOARD</a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a href="" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">Services</a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">Blog</a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">Sign Out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
<main>
  <div class="container-fluid h-100">
    <div class="row h-100"> 
        <div class="col-2" id="green">
          <br>
            <a href="#" class="navbar-brand" onclick="showContent('createBooking')">Create a Booking</a>
            <br/>
            <br/>
            <a href="#" class="navbar-brand" onclick="showContent('checkOrder')">Check My Order</a>
            <br/>
            <br/>
            <a href="#" class="navbar-brand" onclick="showContent('myInformation')">My Information</a>
            <br/>
            
            <br/>
        </div>
          <div class="col-md-8" style="text-align: justify;" id="contentArea">
            
            <!--Content show here-->
          </div>
        
    </div>
  </div>
</main>
<script>
  function showContent(contentType) {
    var contentArea = document.getElementById("contentArea");

    switch (contentType) {
      case 'createBooking':
        contentArea.innerHTML = generateBookingForm();
        break;
      case 'checkOrder':
        contentArea.innerHTML = checkMyOrder();
        break;
      case 'myInformation':
        contentArea.innerHTML = checkMyInfor();
        break;
      default:
        contentArea.innerHTML = "Default content";
    }
  }
  function generateBookingForm() {
  var formHTML = "";
  // Build your form HTML using string concatenation
  // Examples:
  formHTML += `
    <form action="/process-booking" method="post">
      <br>
      <br>
      <h4>Please fill this form to book your service</h4>
      <div class="mb-3">
        <label for="comment" class="form-label">Descript your pet to make a best service for your pet:</label>
        <input type="text" class="form-control" id="comment" name="comment" required>
      </div>
      <div class="mb-3">
        <label for="date" class="form-label">Date:</label>
        <input type="date" class="form-control" id="date" name="date" required>
      </div>
      <div class="mb-3">
        <label for="service" class="form-label">Select Service:</label>
        <select class="form-select" id="service" name="service">
          <option value="1">Pet Sitting</option>
          <option value="2">Dog Walking</option>
          <option value="3">Pet Care Overnight</option>
          <option value="4">Cat Sitting</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="petsitter" class="form-label">Select Sitter:</label>
        <select class="form-select" id="petsitter" name="petsitter">
          <option value="1">Julia Sephora</option>
          <option value="2">Jan Newjon</option>
          <option value="3">Wiliam Majec</option>
          <option value="4">Jane Miliat</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Submit Booking</button>
    </form>
  `;

  return formHTML;
  }

  function checkMyOrder() {

  }

</script>
    

  </body>
</html>