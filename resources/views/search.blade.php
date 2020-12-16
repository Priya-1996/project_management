<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <title>Search Result</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body> -->

<div class="container-fluid" style="margin: auto;">
  <h1>Results</h1>
  @foreach($table as $tab)
  <div class="row">
      {{ @$tab->name }}
      <br>
      {{ @$tab->price }}
      <br>
      <img src="{{ asset('/images/'.@$tab->image) }}" height="100" width="100">    
  </div>
  @endforeach

</div>

<!-- </body>
</html> -->