<section id="mu-contact">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-contact-area">
          <!-- start title -->
          <div class="mu-title">
            <h2>Get in Touch</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores ut laboriosam corporis doloribus, officia, accusamus illo nam tempore totam alias!</p>
          </div>
          <!-- end title -->
          <!-- start contact content -->
          <div class="mu-contact-content">           
            <div class="row">
              <div class="col-md-6">

                <div class="mu-contact-left">
                  <form  action="/contact" method="post" class="contactform">  
                      {{ csrf_field() }}
                    <p class="comment-form-author">
                      <input type="text" required="required" placeholder="FirstName" size="30" value="" name="firstname">
                    </p>
                    <p class="comment-form-author">
                      <input type="text" required="required" size="30" placeholder="LastName" value="" name="lastname">
                    </p>
                    <p class="comment-form-email">
                      <input type="email" placeholder="Email" required="required" aria-required="true" value="" name="email">
                    </p>
                    <p class="comment-form-email">
                      <input type="text" placeholder="Phone" required="required" aria-required="true" value="" name="phone">
                    </p>
                    <p class="comment-form-url">
                      <input placeholder="Subject" type="text" name="subject">  
                    </p>
                    <p class="comment-form-comment">
                      <textarea placeholder="Message" required="required" aria-required="true" rows="8" cols="45" name="message"></textarea>
                    </p>                
                    <p class="form-submit">
                      <input type="submit" value="Send Message" class="mu-post-btn" name="submit">
                    </p>        
                  </form>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mu-contact-right">
                  <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=7926%20jones%20branch%20drive%20mclean%2022102&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net">embedgooglemap.net</a></div><style>.mapouter{text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div>
                </div>
              </div>
            </div>
          </div>
          <!-- end contact content -->
         </div>
       </div>
     </div>
   </div>
 </section>