<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title></title>
    <link rel="stylesheet" href="css/main.css" />
    <link rel="icon" href="images/favicon.png" />
  </head>

  <body>
    <h1>
        Contact Details
        </h1>
        <div>
            
            <p>{{$contact['name']}}</p>
            <p>{{$contact['phone']}}</p>
        </div>
        <div>
            
          <a  href='{{route('contact.index')}}'>Back to All Contacts</a>
      </div>
    <script src="js/scripts.js"></script>
  </body>
</html>