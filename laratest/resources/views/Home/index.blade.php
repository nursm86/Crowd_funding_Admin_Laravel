@extends('layouts.home_navbar')
@section('title','Home')
@section('content')

    <!-----------Banner------------->
    <section id="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6" align="center">
                    <p class="title-index">Online<br>Crowd Funding</p>

                </div>
                <div class="col-md-6 text-center">
                    <img src="/system_images/mainimage.png" class="heart_img">
                </div>
            </div> 
        </div>
        
    </section>
    <img src="/system_images/UpperWave.svg" class="bottom-img">

    <!-----------------services------------>
    
    <section id="services">
        <div class="container text-center">
            <h1 class="title">Donation</h1>
            <div class="row text-center">    
                <!--  
                    campaigns.forEach(function(std){ %>
                    <div class="col-md-16 services">
                        <div class="card-product col-md-8">
                            <a href="/home/donate">
                                <img class="card-image" src="std.image%>"></img>
                            </a>
                            <div class="btn btn-warning"><span ><b>Target : std.tf%>$</b></span></div>
                            <div><span ><b>Raised : std.rf%>$</b></span></div>
                            <div class="add-to-cart"><a class="btn btn-success" style="width:85px;font-family:consolas;margin-top:5px;" href="/home/donate/std.id%>">Donate</a><a class="btn btn-warning" style="width:85px;font-family:consolas;margin-top:5px;" href="/home/editcampaign/std.id%>" <% if(!(user.type == 0 || user.id == std.uid)){%> hidden <%}%>>Edit</a></span></div>
                        </div>
                    </div> 
                
                    }); 
                 -->
            </div>
           <!-- <button type="button" class="btn btn-primary">All Services</button>-->
        </div>
    </section>

    <!--------------------about us-------------->
    <section id="about-us">
        <div class="container">
            <h1 class="title text-center">Top 10 Donations :</h1>
            <div class="row">
                <div class="col-md-6 ">
                    <p class="about-title">There are lot of people who need Donations so donate and be proud of yourself</p>
                    <center><table class="center table" id="myTable" name= "table">
                <thead>
                    <tr>
                        <td>User Name</td>
                        <td>Campaing Title</td>
                        <td>Donation Amount</td>
                        <td>Donated Date</td>
                    </tr>
                </thead>
                <tbody id = "suggestion">
                    <div class="col-md-8">
                       
                </tbody>
            </table></center>
            </div>
                </div>
            </div>
        </div>
    </section>

    <!------------social media------------->
    <section id="social-media">
   
    </section>

    <!------------footer-------------->
    <section id="footer">
        <img src="" alt="">
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-box">
                    <img src="/system_images/mlogo.png" alt="">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate, accusamus repellendus. Ad voluptas inventore mollitia.</p>
                </div>
                <div class="col-md-4 footer-box">
                    <p><b>CONTACT US</b></p>
                    <p> <i class="fa fa-map-marker"></i> AIUB</p>
                    <p><i class="fa fa-phone"></i> +8801622114901</p>
                    <p><i class="fa fa-envelope-o "></i> nursm86@gmail.com</p>
                </div>
                <div class="col-md-4 footer-box">
                    <p>FIND US ON SOCIAL MEDIA</p>
                    <div class="social-icon">
                        <a href="#"><img src="/system_images/fb.png" alt=""></a>
                        <a href="#"><img src="/system_images/insta.png" alt=""></a>
                        
                        <a href="#"><img src="/system_images/whtsapp.png" alt=""></a>
                        <a href="#"><img src="/system_images/linkedin.png" alt=""></a>
                        <a href="#"><img src="/system_images/utube.png" alt=""></a>
                    </div>
                </div>
            </div>
            <hr>
            <p class="copyright">Designed by Md. Nur Islam</p>
        </div>
    </section>


@endsection