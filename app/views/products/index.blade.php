<!--
{{ HTML::style('css/style.css') }}




  

  
  <ul class="navigation">
    <li><a href="" title="Home">Home</a></li>
    <li><a href="" title="About us">About us</a></li>
    <li><a href="" title="Portfolio">Portfolio</a>
      <ul>
        <li><a href="" title="Websites">Websites</a></li>
        <li><a href="" title="Webshops">Webshops</a></li>
        <li><a href="" title="SEO">SEO</a></li>
        <li><a href="" title="Responsive webdesign">Responsive webdesign</a></li>
      </ul>
    </li>
    <li><a href="" title="Contact">Contact</a></li>
    <div class="clear"></div>
  </ul>
  
  <div class="footer">
    <h1 class="pageTitle">Dropdown navigation</h1>
    <p>A beautifull but simple dropdown navigation. Realized with only CSS, no Javascript needed. Great fallback for users who disabled Javascript.</p>
  </div>

<style>
table, th, td  {
	border: 1px solid black;
	padding: 15px;
}
</style>

<h1>{{$title}}</h1>







@if(Session::has('message'))
	<p style="color: green">{{Session::get('message') }}</p>
@endif 
<table>
<tr>
	<th>id</th>
	<th>name</th>
	<th>brand</th>
	<th>description</th>
</tr>

@foreach($products as $product)
<tr>
	<td>{{$product->id}}</td>
	<td>{{ HTML::linkRoute('product',$product->name,$parameters = array($product->id))}}</td>
	<td>{{$product->brand}}</td>
	<td>{{$product->description}}</td>
</tr>
@endforeach
</table>

<p>{{HTML::linkRoute('create','create')}}</p>
-->




























