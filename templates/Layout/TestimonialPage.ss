<h1 class="page-header">$Title</h1>
<article>
    <div class="content">$Content</div>
</article>
$Form
<% if $Testimonials %>
<ul class="testimonials">
    <% loop  $Testimonials  %>
    <li class="testimonial-item $FirstLast">
        $Me
    </li>
    <% end_loop %>
</ul>
<% end_if %>