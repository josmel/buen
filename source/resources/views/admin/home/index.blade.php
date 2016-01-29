
@extends('admin._layouts.layout')
@section('content')
<div class="container-gen">
  <div class="box-center">
    <h2>Dashboard</h2>
    <div class="charts-ctn">
      <div id="views" width="200px" data-var="var_views" data-label="Visitas" class="barChart"></div>
      <div id="posts" width="200px" data-var="var_posts" data-label="Publicaciones" class="barChart"></div>
    </div>
    <div class="ctn-premium-post"></div>
  </div>
</div>
<script type="text/template" id="tplPremiumPost">
  <div class="premium-post">
    <div class="user-img-ctn"><img src="<%= picture_user %>"/>
      <div class="details-ctn">
        <p><i class="icon icon-calendar"></i> <%= date_publish %></p>
        <p><i class="icon icon-comments"></i> <%= comments %> Comentarios</p>
        <p><i class="icon icon-smiley"></i> <%= likes %> Buen dato</p>
        <p><i class="icon icon-category"></i>Categoria: <%= name_category %></p>
      </div>
    </div>
    <div class="post-ctn">
      <h2><%= name_user %></h2>
      <p><%= description %></p>
      <div class="btns-ctn"><a href="<%= detalle %>" class="btn btn-success">Ver detalle</a></div>
    </div>
  </div>
</script>
<script>
  var data = {};
  var premiumAds = <?php echo $listPremiumAds_;?>;
  var visits = <?php echo $visits;?>;
  //Cambiar los montos por los correctos de bd
  data['var_views'] = [['Día', visits.viewers['Día']], ['Semana', visits.viewers['Semana']], ['Mes', visits.viewers['Mes']]];
  data['var_posts'] = [['Día', visits.posts['Día']], ['Semana', visits.posts['Semana']], ['Mes', visits.posts['Mes']]];
</script>@stop