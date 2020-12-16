<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="ps-page--single" id="about-us"><img src="https://eudyogaadhaar.org/udyam.jpg" alt="">
    </div>

    <div class="container" style="background-color: #fff; margin-top: 15px;">

    <div class="ps-layout__right">
            <div class="ps-block--shop-features">
                <div class="ps-block__header text-center">
                    <h2 style="margin: auto; padding: 10px;">UDYAM Registration <span style="color: red;">*</span> </h2>
                </div>
                <h4 class="text-center">* With effect from 1st July 2020, MSME/ Udyog Aadhaar Registration will now be called as Udyam Registration.</h4>
                <p class="text-center"> * Mobile Number Must Be Registered With Aadhaar for OTP XXX Verification.</p>
                <div class="ps-block__content">
                        <div class="row">
                                <div class="col-md-6">
                                         <div class="ps-form__content">
                                            <div class="form-group">
                                        <label>1. Applicant Name / आवेदक का नाम (Required) *
                                            <span id="some-div">
                                                <img src="<?php echo e(asset('msmelist')); ?>/img/info.svg"
                                                     width="20" data-toggle="tooltip"
                                                     data-placement="right" data-trigger="hover"
                                                     title="Applicant Name : Applicant is required to enter his/her name exactly as mentioned on Aadhaar card, issued by UIDAI.
                                                Note:- You Can Only Register One Udyam Registration Per Aadhaar Card.">
                                            </span>
                                        </label>

                                        <input class="form-control" type="text" placeholder="Please enter your name...">
                                    </div>

                                            <div class="form-group">
                                                    <label>2. Mobile Number / मोबाइल संख्या (Required) *
                                                        <span id="some-div">
                                                            <img src="<?php echo e(asset('msmelist')); ?>/img/info.svg" width="20"
                                                                  data-toggle="tooltip"
                                                                 data-placement="right"
                                                                 data-trigger="hover"
                                                                 title="Mobile Number : Applicant are required to enter his / her Indian mobile number. Do not add +91.">
                                                        </span>
                                                    </label>

                                                <input class="form-control" type="number" placeholder="Please enter phone number...">
                                            </div>

                                            <div class="form-group">
                                                <label>3. Email Id / ईमेल आईडी (Required) *
                                                    <span id="some-div">
                                                        <img src="<?php echo e(asset('msmelist')); ?>/img/info.svg" width="20"
                                                             data-toggle="tooltip" data-placement="right" data-trigger="hover"
                                                             title="Email Id : Applicant are required to enter his / her email id, as certificate and acknowledgement will be send to registered id.">
                                                     </span>
                                                </label>

                                                <input class="form-control" type="email" placeholder="Please enter your email..." >
                                            </div>

                                            <div class="form-group">
                                                <label>4. GST Number / जीएसटी नंबर (Optional)
                                                    <span id="some-div">
                                                        <img src="<?php echo e(asset('msmelist')); ?>/img/info.svg" width="20"
                                                             data-toggle="tooltip" data-placement="right" data-trigger="">
                                                    </span>
                                                </label>

                                                <input class="form-control" type="text" placeholder="Please enter your GST Number(Optional)">
                                            </div>

                                            <div class="form-group">
                                                <label>5. Office Address / कार्यालय का पता
                                                    <span id="some-div">
                                                        <img src="<?php echo e(asset('msmelist')); ?>/img/info.svg" width="20"
                                                             data-toggle="tooltip" data-placement="right"
                                                             data-trigger="hover" title="Office Address : Applicant can enter his / her complete office address with state and pincode.">
                                                    </span>
                                                </label>
                                                <input class="form-control" type="text" placeholder="Please enter your Office Address">
                                            </div>

                                            <div class="form-group" >
                                                      <p> Location of Plant is same as office address </p>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" onchange="readonly_on()"  type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" selected aria-selected="true">
                                                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" onchange="readonly_off()"  type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                                    </div>
                                                </div>

                                             <div class="form-group">
                                                    <label>Location of Plant / संयंत्र के स्थान
                                                        <span id="some-div">
                                                            <img src="<?php echo e(asset('msmelist')); ?>/img/info.svg" width="20"
                                                                 data-toggle="tooltip" data-placement="right"
                                                                 data-trigger="hover" title="Plant Address : Applicant are required to enter his / her complete plant address with state and pincode.">
                                                         </span>
                                                    </label>

                                                    <input id="plantaddress" class="form-control plantaddress" type="text" placeholder="Please enter Plant Location Address" readonly>
                                                </div>

                                            <div class="form-group">
                                                <label>6. Gender / लिंग
                                                    <span id="some-div">
                                                        <img src="<?php echo e(asset('msmelist')); ?>/img/info.svg" width="20"
                                                                             data-toggle="tooltip" data-placement="right" data-trigger="hover" title="Gender : Applicant can select gender category.">
                                                    </span>
                                                </label>
                                                <select class="form-control">
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                    <option value="3">Other</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                     <label>7. Social Category / सामाजिक श्रेणी
                                                         <span id="some-div">
                                                             <img src="<?php echo e(asset('msmelist')); ?>/img/info.svg" width="20"
                                                                  data-toggle="tooltip" data-placement="right" data-trigger="hover" title="Social Category : Applicant can select social category.">
                                                        </span>
                                                     </label>
                                                <select class="form-control">
                                                    <option value="1">General</option>
                                                    <option value="2">OBC</option>
                                                    <option value="3">SC</option>
                                                    <option value="3">ST</option>
                                                </select>
                                            </div>

                                           <div class="form-group">
                                                    <label>8. Are you Physically Handicapped? / क्या आप शारीरिक रूप से विकलांग हैं?
                                                        <span id="some-div">
                                                            <img src="<?php echo e(asset('msmelist')); ?>/img/info.svg" width="20"
                                                                 data-toggle="tooltip" data-placement="right" data-trigger="hover" title="Physically Handicapped : Applicant can select his / her disability.">
                                                        </span>
                                                    </label>

                                                    <select class="form-control">
                                                        <option value="1">Yes</option>
                                                        <option value="2">No</option>
                                                    </select>
                                            </div>

                                           <div class="form-group">
                                                    <label>9. Aadhaar Number / आधार संख्या (Required) *
                                                        <span id="some-div">
                                                            <img src="<?php echo e(asset('msmelist')); ?>/img/info.svg" width="20"
                                                                 data-toggle="tooltip" data-placement="right"
                                                                 data-trigger="hover" title="Enter a 12 digit Aadhaar number issued by UIDAI. (Aadhaar Card will be verified after form submission within 48 hours after submission, our Executive will call & Verify OTP with other relevant information)">
                                                            </span>
                                                    </label>

                                                    <input id="plantaddress" class="form-control plantaddress" type="text" placeholder="Please enter Plant Location Address" >
                                                </div>

                                           <div class="form-group">
                                                    <label>10. PAN Card Number / पैन कार्ड संख्या
                                                        <span id="some-div">
                                                            <img src="<?php echo e(asset('msmelist')); ?>/img/info.svg" width="20"
                                                                 data-toggle="tooltip" data-placement="right"
                                                                 data-trigger="hover"
                                                                 title="Pan Card Number : Applicant have to enter his / her PAN card number in case of Co-Operative / Private Limited / Public Limited / Limited Liability Partnership. Optional for Proprietorship Firm / Partnership Firm / Hindu Undivided Family / Self Help Group / Society Trust.">
                                                        </span>
                                                    </label>
                                                    <input id="plantaddress" class="form-control plantaddress" type="text" placeholder="Please enter Plant Location Address" >
                                                </div>


                                           <div class="form-group">
                                                    <label>11 Bank Name / बैंक का नाम
                                                        <span id="some-div">
                                                            <img src="<?php echo e(asset('msmelist')); ?>/img/info.svg" width="20"
                                                                 data-toggle="tooltip" data-placement="right" data-trigger="hover" title="">
                                                          </span>
                                                    </label>
                                                    <input id="plantaddress" class="form-control plantaddress" type="text" placeholder="Please enter Plant Location Address" >
                                                </div>

                                           <div class="form-group">
                                                    <label>12. Bank Account Number / बैंक खाता संख्या
                                                        <span id="some-div">
                                                            <img src="<?php echo e(asset('msmelist')); ?>/img/info.svg" width="20"
                                                                 data-toggle="tooltip" data-placement="right"
                                                                 data-trigger="hover" title="Bank Account Number : Applicant can enter his / her bank account number.">
                                                        </span>
                                                    </label>

                                                    <input id="plantaddress" class="form-control plantaddress" type="text" placeholder="Please enter Plant Location Address" >
                                                </div>

                                           <div class="form-group">
                                                    <label>13. IFSC Code / IFSC कोड
                                                        <span id="some-div">
                                                            <img src="<?php echo e(asset('msmelist')); ?>/img/info.svg" width="20"
                                                                 data-toggle="tooltip" data-placement="right" data-trigger="hover" title="IFSC Code : Applicant can enter his / her bank IFSC code.">
                                                         </span>
                                                    </label>
                                                    <input id="plantaddress" class="form-control plantaddress" type="text" placeholder="Please enter Plant Location Address" >
                                                </div>

                                                <div class="form-group">
                                                    <label>14. Business Name / बिजनेस का नाम
                                                        <span id="some-div">
                                                            <img src="<?php echo e(asset('msmelist')); ?>/img/info.svg" width="20"
                                                                 data-toggle="tooltip" data-placement="right" data-trigger="hover"
                                                                 title="Business Name : Applicant have to enter his / her business name, as it will get printed on certificate.">
                                                          </span>
                                                    </label>
                                                    <input id="plantaddress" class="form-control plantaddress" type="text" placeholder="Please enter Plant Location Address" >
                                                </div>

                                                <div class="form-group">
                                                    <label>15. Date of Commencement of Business / बिजनेस आरंभ करने की तिथि
                                                        <span id="some-div">
                                                            <img src="<?php echo e(asset('msmelist')); ?>/img/info.svg" width="20"
                                                                 data-toggle="tooltip" data-placement="right"
                                                                 data-trigger="hover" title="Date of Commencement of Business : Applicant have to select the date of business started, as it will get printed on certificate.">
                                                      </span>
                                                    </label>

                                                    <input id="plantaddress" class="form-control plantaddress" type="text" placeholder="Please enter Plant Location Address" >
                                                </div>

                                                <div class="form-group">
                                                        <label>16. Type of Organisation / संगठन वर्ग
                                                            <span id="some-div">
                                                                <img src="<?php echo e(asset('msmelist')); ?>/img/info.svg" width="20"
                                                                     data-toggle="tooltip"
                                                                     data-placement="right"
                                                                     data-trigger="hover" title="Type of Organization : Applicant have to select the type of organization, as it will get printed on certificate.">                                            </span>
                                                         </label>

                                                        <select name="org_type " class="form-control">
                                                            <option value="Select" selected="selected"> Select</option>
                                                            <option value="Proprietorship"> Proprietorship </option>
                                                            <option value="Partnership Firm"> Partnership Firm </option>
                                                            <option value="Hindu Undivided Family"> Hindu Undivided Family </option>
                                                            <option value="Co-operative">Co-operative</option>
                                                            <option value="Limited Liability Partnership">LLP</option>
                                                            <option value="Public Limited ">Public Limited</option>
                                                            <option value="Private Limited">Private Limited</option>
                                                            <option value="Self Help Group">Self Help Group</option>
                                                            <option value="Society">Society</option>
                                                            <option value="Trust">Trust</option>
                                                          </select>
                                                </div>

                                                <div class="form-group">
                                                        <label>17. Main Business Activity of Enterprise / मुख्य बिजनेस गतिविधि
                                                            <span id="some-div">
                                                                <img src="<?php echo e(asset('msmelist')); ?>/img/info.svg" width="20"
                                                                     data-toggle="tooltip" data-placement="right"
                                                                     data-trigger="hover" title="Main Business Activity of Enterprise : Applicant can select the main business activity.">
                                                            </span>
                                                        </label>
                                                        <select name="org_type " class="form-control">
                                                            <option value="Select" selected="selected"> Manufacturer</option>
                                                            <option value="Proprietorship"> Service Provider </option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>18. Additional Details About Business / अतिरिक्त विस्तर बिजनेस के बारे में
                                                        <span id="some-div">
                                                            <img src="<?php echo e(asset('msmelist')); ?>/img/info.svg" width="20"
                                                                 data-toggle="tooltip" data-placement="right"
                                                                 data-trigger="hover" title="Additional Details About Business : Applicant can enter additional details about business. (For example – manufacturing of Food Products, Computer Programming, Software Development)">
                                                        </span>
                                                    </label>
                                                    <input id="plantaddress" class="form-control plantaddress" type="text" placeholder="Please enter Plant Location Address" >
                                                </div>

                                                <div class="form-group">
                                                    <label>19. Number of Employees / कर्मचारी संख्या
                                                            <span id="some-div">
                                                                <img src="<?php echo e(asset('msmelist')); ?>/img/info.svg" width="20"
                                                                  data-toggle="tooltip" data-placement="right" data-trigger="hover" title="Number of Employees : Applicant can enter number of workers in his / her firm.">
                                                            </span>
                                                    </label>

                                                    <input id="plantaddress" class="form-control plantaddress" type="number" placeholder="Please enter Plant Location Address" >
                                                </div>

                                                <div class="form-group">
                                                        <label>20. Investment in Plant and Machinery (Amount in Lacs) / बिजनेस निवेश
                                                            <span id="some-div">
                                                                <img src="<?php echo e(asset('msmelist')); ?>/img/info.svg" width="20"
                                                                     data-toggle="tooltip" data-placement="right" data-trigger="hover"
                                                                     title="Investment in Plant & Machinery / Equipment : Applicant can enter the total investment made in Plant, Machinery, and Equipment, etc. to start his / her business.">
                                                             </span>
                                                        </label>
                                                    <input id="plantaddress" class="form-control plantaddress" type="number" placeholder="Please enter Plant Location Address" >
                                                </div>


                                                <div class="form-group">
                                                    <label>21. Turnover (per annum) / टर्नओवर (प्रति वर्ष)
                                                        <span id="some-div">
                                                            <img src="<?php echo e(asset('msmelist')); ?>/img/info.svg" width="20"  data-toggle="tooltip" data-placement="right" data-trigger="hover" title="">
                                                          </span>
                                                    </label>
                                                    <input id="plantaddress" class="form-control plantaddress" type="number" placeholder="Please enter Plant Location Address" >
                                                </div>

                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" style="margin-top: 0px!important;">
                                                    <label class="form-check-label" for="exampleCheck1" style="padding-left: 5px;">I Accept all terms and conditions</label>
                                                </div>

                                                <div class="form-group submtit pt-3">
                                                    <button class="ps-btn ">Submit and Pay</button>
                                                </div>
                                        </div>
                                </div>

                            <div class="col-md-6 asideinfo">
                                    <div class="">
                                        <div class="points">
                                            <h5 class="text-danger">
                                                Applicant Name : Applicant are required to enter his / her name as mentioned on Aadhaar card, issued by UIDAI.
                                                Note:- You Can Only Register One Udyam Registration Per Aadhaar Card.
                                            </h5>
                                        </div>

                                        <div class="points">
                                           <h5>
                                                Mobile Number : Applicant are required to enter his / her Indian mobile number. Do not add +91.
                                            </h5>
                                        </div>

                                        <div class="points">
                                            <h5>
                                                Email Id : Applicant are required to enter his / her email id, as certificate and acknowledgement will be send to registered id.

                                            </h5>
                                        </div>

                                        <div class="points d-none d-md-block ">
                                            <h5>

                                            </h5>
                                        </div>

                                        <div class="points d-none d-md-block ">
                                            <h5>

                                            </h5>
                                        </div>
                                        <div class="points">
                                            <h5>
                                                Office Address : Applicant can enter his / her complete office address with state and pincode.

                                            </h5>
                                        </div>
                                        <div class="points d-none d-md-block ">
                                            <h5>

                                            </h5>
                                        </div>
                                        <div class="points">
                                            <h5>
                                                Plant Address : Applicant are required to enter his / her complete plant address with state and pincode.

                                            </h5>
                                        </div>
                                        <div class="points">
                                            <h5>
                                                Gender : Applicant can select gender category.

                                            </h5>
                                        </div>
                                        <div class="points d-none d-md-block ">
                                            <h5>

                                            </h5>
                                        </div>
                                        <div class="points">
                                            <h5>
                                                Social Category : Applicant can select social category.

                                            </h5>
                                        </div>
                                         <div class="points">
                                            <h5>
                                                Physically Handicapped : Applicant can select his / her disability.

                                            </h5>
                                        </div>
                                        <div class="points d-none d-md-block ">
                                            <h5>

                                            </h5>
                                        </div>
                                        <div class="points">
                                            <h5>
                                                Enter a 12 digit Aadhaar number issued by UIDAI. (Aadhaar Card will be verified after form submission within 48 hours after submission, our Executive will call & Verify OTP with other relevant information)

                                            </h5>
                                        </div>
                                        <div class="points">
                                            <h5>
                                                Pan Card Number : Applicant have to enter his / her PAN card number in case of Co-Operative / Private Limited / Public Limited / Limited Liability Partnership. Optional for Proprietorship Firm / Partnership Firm / Hindu Undivided Family / Self Help Group / Society Trust.

                                            </h5>
                                        </div>
                                        <div class="points d-none d-md-block ">
                                            <h5>

                                            </h5>
                                        </div>
                                        <div class="points">
                                            <h5>
                                                Bank Account Number : Applicant can enter his / her bank account number.

                                            </h5>
                                        </div>
                                        <div class="points">
                                            <h5>
                                                IFSC Code : Applicant can enter his / her bank IFSC code.

                                            </h5>
                                        </div>
                                        <div class="points d-none d-md-block ">
                                            <h5>

                                            </h5>
                                        </div>
                                        <div class="points">
                                            <h5>
                                                Business Name : Applicant have to enter his / her business name, as it will get printed on certificate.
                                            </h5>
                                        </div>
                                        <div class="points">
                                            <h5>
                                                Date of Commencement of Business : Applicant have to select the date of business started, as it will get printed on certificate.

                                            </h5>
                                        </div>
                                        <div class="points">
                                            <h5>
                                                Type of Organization : Applicant have to select the type of organization, as it will get printed on certificate.

                                            </h5>
                                        </div>
                                        <div class="points d-none d-md-block ">
                                            <h5>

                                            </h5>
                                        </div>
                                        <div class="points">
                                            <h5>
                                                Main Business Activity of Enterprise : Applicant can select the main business activity.

                                            </h5>
                                        </div>
                                        <div class="points">
                                            <h5>
                                                Additional Details About Business : Applicant can enter additional details about business. (For example – manufacturing of Food Products, Computer Programming, Software Development)

                                            </h5>
                                        </div>
                                        <div class="points">
                                            <h5>
                                                Number of Employees : Applicant can enter number of workers in his / her firm.

                                            </h5>
                                        </div>
                                        <div class="points">
                                            <h5>
                                                Investment in Plant & Machinery / Equipment : Applicant can enter the total investment made in Plant, Machinery, and Equipment, etc. to start his / her business.

                                            </h5>
                                        </div>
                                    </div>
                            </div>
                        </div>
                </div>
            </div>


        </div>

        <div class="m-scroll">
            <div class="m-scroll__title">
                <div>
                    <p>
                        Disclaimer: MSMELIST.COM is a wholly Owned &amp; Operated by a Private Entity and is not Associated with Ministry of Micro, Small and Medium Enterprises. We Help you with Registration Process and Certificaion.
                    </p>
                </div>
            </div>
        </div>
        <h5> Note: msmelist.com is owned by a Private Organization and fee charged by us is our Consultancy fee, not registration fee.</h5>

        <h3 class="text-center"> PROCEDURE TO OBTAIN UDYAM REGISTRATION CERTIFICATE ONLINE
        </h3>
        <div id="btns">
            <div class="btn" onclick="window.location='#'">
                 <img src="<?php echo e(asset('msmelist')); ?>/img/form.svg" width="65">
                <h3>1. Submit Application</h3>
            </div>
            <div class="btn" onclick="window.location='#'">
                <img src="<?php echo e(asset('msmelist')); ?>/img/payment.svg" width="65">

                <h3>2. Make Payment</h3>
            </div>
            <div class="btn" onclick="window.location='#'">
                <img src="<?php echo e(asset('msmelist')); ?>/img/upload.svg" width="65">

                <h3>3. Processes Application</h3>
            </div>
            <div class="btn" onclick="window.location='#'">
                <img src="<?php echo e(asset('msmelist')); ?>/img/certificate.svg" width="65">
                <h3>4. Receive Certificate</h3>
            </div>
        </div>



    <div class="ps-faqs">
        <div class="container">
            <div class="ps-section__header" style="padding-bottom: 10px;">
                <h3 class="text-center">BENEFITS OF HAVING MSME CERTIFICATE</h3>
            </div>

            <div class="ps-section__content">
                <div class="table-responsive">
                    <table class="table ps-table--faqs">
                        <tbody>
                        <tr>
                            <td class="question">Collateral Free loans from banks</td>
                            <td>The Credit Guarantee Fund Scheme for Micro and Small Enterprises (CGS) was launched by the Government of India to make available collateral-free credit to the micro and small enterprise sector. Both the existing and the new enterprises are eligible to be covered under the scheme. The Ministry of Micro, Small and Medium Enterprises, Government of India and Small Industries Development Bank of India (SIDBI), established a Trust named Credit Guarantee Fund Trust for Micro and Small Enterprises (CGTMSE) to implement the Credit Guarantee Fund Scheme for Micro and Small Enterprises</td>
                        </tr>
                        <tr>
                            <td class="question">Reservation policies to manufacturing / production sector</td>
                            <td>Reservation of items for exclusive manufacture in SSI sector statutorily provided for in the Industries (Development and Regulation) Act, 1951, has been one of the important policy measures for promoting this sector.
                                <strong>The Reservation Policy has two objectives </strong> Ensure increased production of consumer goods in the small scale sector Expand employment opportunities through setting up of small scale industries</td>
                        </tr>
                        <tr>
                            <td class="question">How Long Will It Take To Get My Package?</td>
                            <td>Swag slow-carb quinoa VHS typewriter pork belly brunch, paleo single-origin coffee Wes Anderson. Flexitarian Pitchfork forage, literally paleo fap pour-over. Wes Anderson Pinterest YOLO fanny pack meggings, deep v XOXO chambray sustainable slow-carb raw denim church-key fap chillwave Etsy. +1 typewriter kitsch, American Apparel tofu Banksy Vice.</td>
                        </tr>
                        <tr>
                            <td class="question"> Very easy to get Licenses, approvals and registrations</td>
                            <td>It has made very easy for enterprises that are having MSME Certificate to obtain Licenses, approvals and registrations on any field for their business from the respective authorities as they can produce the Certificate of MSME Registration while making application.</td>
                        </tr>
                        <tr>
                            <td class="question">Special consideration on international trade fairs</td>
                            <td>Under the International Cooperation Scheme, financial assistance is provided on reimbursement basis to the State/Central Government organizations, industries/enterprises Associations and registered societies/trusts and organizations associated with MSME for deputation of MSME business delegation to other countries for exploring new areas of MSMEs, participation by Indian MSMEs in international exhibitions, trade fairs, buyer seller meet and for holding international conference and seminars which are in the interest of MSME sectors.</td>
                        </tr>
                        <tr>
                            <td class="question"> Octroi benefits</td>
                            <td>The scheme of refund of octroi provided under the Package Scheme of Incentives, 1993 will be included in the new Scheme up to 31-3-2006 on the same pattern. Where account-based cess or other levy is charged instead of or in lieu of octroi, such change will also be eligible for refund as in the case of octroi.</td>
                        </tr>
                        <tr>
                            <td class="question">Waiver of Stamp Duty and Registration Fees</td>
                            <td>At present, IT units in public IT Parks are exempted from stamp Duty and Registration fees upto 31st March 2006. Now all new industrial units having MSME Registration and expansions will be exempted from payment of Stamp Duty and Registration fees.</td>
                        </tr>
                        <tr>
                            <td class="question">Exemption under Direct Tax Laws</td>
                            <td>Enterprises that have MSME Registration can enjoy Direct Tax Exemption in the initial year of business, as mention in the scheme by Government and depending on business activity.</td>
                        </tr>
                        <tr>
                            <td class="question">Bar Code registration subsidy</td>
                            <td>Enterprises that have MSME Registration can avail Bar Code Registration subsidy as mentioned in the scheme.</td>
                        </tr>

                        <tr>
                            <td class="question">Subsidy on NSIC Performance and Credit ratings </td>
                            <td>Enterprises that have MSME Registration can avail Subsidy on NSIC Performance and Credit ratings as mentioned in the scheme. </td>
                        </tr>

                        <tr>
                            <td class="question">Eligible for IPS subsidy </td>
                            <td> Enterprises that have MSME Registration are eligible for Industrial Promotion Subsidy (IPS) as mentioned in the scheme.</td>
                        </tr>

                        <tr>
                            <td class="question"> Counter Guarantee from Government of India through CGSTI</td>
                            <td> Enterprises that have MSME Registration are eligible for Counter Guarantee from Government of India through CGSTI.</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('msmescripts'); ?>
    <script>


        function readonly_off() {
          var e =  document.getElementById('plantaddress');
            e.removeAttribute('readonly');
        };

        function readonly_on() {
            document.getElementById("plantaddress").readOnly = true;
        };

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('msme.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/msme/udyam.blade.php ENDPATH**/ ?>