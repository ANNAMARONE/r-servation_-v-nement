@extends('layouts.sidebar_admin')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div id="contenaire" class="container mt-3">
  <h2>ajouter un permission</h2>
  <form action="{{Route('permissions.store')}}" method="post">
    @csrf
    <div class="mb-3 mt-3">
    <div class="form-floating">
  <textarea class="form-control" id="comment" name="name" placeholder="Comment goes here"></textarea>
  
</div>
    <button type="submit" class="btn btn-primary">envoyer</button>
  </form>
</div>
<style>
    #contenaire{
        padding-top: 10rem;

        margin-left: 20%;
    }
</style>
</body>
</html>
