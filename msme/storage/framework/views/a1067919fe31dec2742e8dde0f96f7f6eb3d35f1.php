<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php if($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_DEFAULT): ?>
        <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url( <?php echo e(asset('frontend/images/placeholder/header-inner.jpg')); ?>);" data-aos="fade" data-stellar-background-ratio="0.5">

    <?php elseif($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_COLOR): ?>
        <div class="site-blocks-cover inner-page-cover overlay" style="background-color: <?php echo e($site_innerpage_header_background_color); ?>;" data-aos="fade" data-stellar-background-ratio="0.5">

    <?php elseif($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_IMAGE): ?>
        <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url( <?php echo e(Storage::disk('public')->url('customization/' . $site_innerpage_header_background_image)); ?>);" data-aos="fade" data-stellar-background-ratio="0.5">

    <?php elseif($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO): ?>
        <div class="site-blocks-cover inner-page-cover overlay" style="background-color: #333333;" data-aos="fade" data-stellar-background-ratio="0.5">
    <?php endif; ?>



        <?php if($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO): ?>
            <div data-youtube="<?php echo e($site_innerpage_header_background_youtube_video); ?>"></div>
        <?php endif; ?>

        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                    <div class="row justify-content-center mt-5">
                        <div class="col-md-8 text-center">
                            <h1 style="color: <?php echo e($site_innerpage_header_title_font_color); ?>;"><?php echo e(__('frontend.about.title')); ?></h1>
                            <p class="mb-0" style="color: <?php echo e($site_innerpage_header_paragraph_font_color); ?>;"><?php echo e(__('frontend.about.description')); ?></p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="site-section"  data-aos="fade">
        <div class="container">


           <h3 class="text-center"> TERMS AND CONDITIONS</h3>

           <h5> PLEASE READ THE FOLLOWING TERMS AND CONDITIONS OF USE AGREEMENT CAREFULLY</h5>

<p>            The following agreement captures the terms and conditions of use ("Agreement"), applicable to Your use of msmelist.com ("Web Site"), which promotes business between suppliers and buyers globally. It is an agreement between You as the user of the Web Site/MSMELIST.COM Services and MSMELIST.COM. The expressions “You” “Your” or “User(s)” refers to any person who accesses or uses the Web Site for any purpose.</p>

            <p>         By subscribing to or interacting with other User(s) on or entering into negotiations in respect of sale or supply of goods or services on or using the Web Site or MSMELIST.COM Services in any manner for any purpose, You undertake and agree that You have fully read, understood and accepted the Agreement.

            <p> If You do not agree to or do not wish to be bound by the Agreement, You may not access or otherwise use the Web Site in any manner.<p>
          <ul>
                <li> Web site-Merely a Venue/Platform</li>
                <li> Services Provided by IIL</li>
                <li> User(s) Eligibility</li>
                <li>  User(s) Agreement</li>
                <li>  Amendment to the Agreement</li>
                <li>  Intellectual Property Rights</li>
                <li>  Links to Third Party Sites/Content</li>
                <li>  Termination</li>
                <li>  Registered User(s)</li>
                <li>  Data Protection/Personal Information</li>
                <li>  Posting your Contents on IIL</li>
                <li>   Interactions between User(s)</li>
                <li>   Limitations of Liability/Disclaimer</li>
                <li>   Notices</li>
                <li>   Governing Law and Disputes Resolutions </li>


                <li> General/Miscellaneous</li>
                <li> Big Buyer terms of use</li>
            </ul>

            <h5> I. WEBSITE- MERELY A VENUE/PLATFORM </h5>

            <p> The Web Site acts as a match-making platform for User(s) to negotiate and interact with other User(s) for entering into negotiations in respect thereof for sale or supply of goods or services. MSMELIST.COM are not parties to any negotiations that take place between the User(s) of the Web Site and are further not parties to any agreement including an agreement for sale or supply of goods or services or otherwise, concluded between the User(s) of the Web Site.</p>

<p>            MSMELIST.COM does not control and is not liable in respect of or responsible for the quality, safety, genuineness, lawfulness or availability of the products or services offered for sale on the Web Site or the ability of the User(s) selling or supplying the goods or services to complete a sale or the ability of User(s) purchasing goods or services to complete a purchase. This agreement shall not be deemed to create any partnership, joint venture, or any other joint business relationship between MSMELIST.COM and any other party.<p>

            <h5>            II. SERVICES PROVIDED BY MSMELIST.COM</h5>

            <p>            MSMELIST.COM  provides the following services to its Customers and their respective definitions are classified here under:</p>

            <ul>
                <li> "Leading Supplier": It gives the User(s)s priority listing within categories of their choice as available on MSMELIST.COM, thus increasing visibility of their products.</li>

                <li> "Star Supplier" : It is add-on service by MSMELIST.COM which gives its User(s) priority listing in their chosen category of products. By availing this service the User(s) will get benefits of increased leads and enquiries.</li>

                <li> "TrustSEAL": is a seal that User(s) gets after getting its business-related documents and information verified.</li>
                <li>  "Maximiser" : User(s) availing this service could maximize its return on investment by availing the specialised feature of this package.</li>
                <li>  "Mini Dynamic Catalouge": It is a professionally-designed catalog on MSMELIST.COM along with independent control to add, delete, edit text and images as per requirement of customers.</li>
                <li> "Verified" User(s): Users are said to be verified if any of their provided primary/ secondary, mobile or email is verified by MSMELIST.COM .</li>
            </ul>

<h5>            III. USER(S) ELIGIBILITY</h5>

<p>            User(s) represent and warrant that they have the right to avail or use the services provided by MSMELIST.COM , including but limited to the Web Site or any other services provided by MSMELIST.COM  in relation to the use of the Web Site ("MSMELIST.COM ’s Services"). MSMELIST.COM ’s Services can only be availed by those individuals or business entities, including sole proprietorship firms, companies and partnerships, which are authorised under applicable law to form legally binding agreements. As such, natural persons below 18 years of age and business entities or organisations that are not authorised by law to operate in India or other countries are not authorised to avail or use MSMELIST.COM ’s Services.</p>

     <p>       User(s) agree to abide by the Agreement and any other rules and regulations imposed by the applicable law from time to time. MSMELIST.COM  or the website shall have no liability to the User(s) or anyone else for any content, information or any other material transmitted over MSMELIST.COM ’s Services, including any fraudulent, untrue, misleading, inaccurate, defamatory, offensive or illicit material and that the risk of damage from such material rests entirely with each User(s).The user shall do its own due diligence before entering into any transaction with other users on the website. MSMELIST.COM  at it’s sole discretion reserves the right to refuse MSMELIST.COM ’s Services to anyone at any time. MSMELIST.COM ’s Services are not available and may not be availed or used by User(s) whose Accounts have been temporarily or indefinitely suspended by MSMELIST.COM.</p>


            <h5>IV. USER(S) AGREEMENT</h5>

            <p>  This Agreement applies to any person who accesses or uses the Web Site or uses MSMELIST.COM  Services for any purpose. It also applies to any legal entity which may be represented by any person who accesses or uses the Web Site, under actual or apparent authority. User(s) may use this Web Site and/or MSMELIST.COM  Services solely for their commercial/business purposes.</p>

            <p>  This Agreement applies to all services offered on the Web Site and by MSMELIST.COM , collectively with any additional terms and conditions that may be applicable in respect of any specific service used or accessed by User(s) on the Web Site. In the event of any conflict or inconsistency between any provision of this Agreement and any additional terms and conditions applicable in respect of any service offered on the Web Site, such additional terms and conditions applicable in respect of that service shall prevail over this Agreement.</p>

            <h5>            V. AMENDMENT TO USER(S) AGREEMENT</h5>

            <p> MSMELIST.COM  reserves the right to change, modify, amend, or update the Agreement from time to time and such amended provisions of the Agreement shall be effective immediately upon being posted on the Web Site. If You do not agree to such provisions, You must stop using the service with immediate effect. Your continuous use of the service will be deemed to signify Your acceptance of the amended provisions of the Agreement.</p>

            <h5>VI. INTELLECTUAL PROPERTY RIGHTS</h5>

            <p> MSMELIST.COM  is the sole owner and the lawful licensee of all the rights to the Web Site and its content ("Web Site Content"). Web Site Content means the design, layout, text, images, graphics, sound, video etc. of or made available on the Web Site. The Web Site Content embodies trade secrets and other intellectual property rights protected under worldwide copyright and other applicable laws pertaining to intellectual property. All title, ownership and intellectual property rights in the Web Site and the Web Site Content shall remain in MSMELIST.COM , its affiliates or licensor’s of the Web Site content, as the case may be.</p>

            <p>All rights, not otherwise claimed under this Agreement by MSMELIST.COM , are hereby reserved. Any information or advertisements contained on, distributed through, or linked, downloaded or accessed from any of the services contained on the Web Site or any offer displayed on or in connection with any service offered on the Web Site ("Website Information") is intended, solely to provide general information for the personal use of the User(s), who fully accept any and all responsibility and liabilities arising from and out of the use of such Information. MSMELIST.COM  does not represent, warrant or endorse in any manner the accuracy or reliability of Website Information, or the quality of any products and/or services obtained by the User(s) as a result of any Website Information.</p>

            <p>For any content and or link uploaded to the Website by the User from Youtube, the User agrees to abide and accepts, the terms of service of Youtube, available at https://www.youtube.com/t/terms.</p>

            <p> The Information is provided “as is” with no guarantee of completeness, accuracy, timeliness or of the results obtained from the use of the Information, and without warranty of any kind, express or implied, including, but not limited to warranties of performance, merchantability and fitness for a particular purpose. Nothing contained in the Agreement shall to any extent substitute for the independent investigations and the sound technical and business judgment of the User(s). In no event shall MSMELIST.COM  be liable for any direct, indirect, incidental, punitive, or consequential damages of any kind whatsoever with respect to MSMELIST.COM ’s Services. User(s) hereby acknowledge that any reliance upon the Information shall be at their sole risk and further understand and acknowledge that the Information has been compiled from publicly aired and published sources. MSMELIST.COM  respects the rights of such entities and cannot be deemed to be infringing on the respective copyrights or businesses of such entities. MSMELIST.COM  reserves the right, in its sole discretion and without any obligation, to make improvements to, or correct any error or omissions in any portion of the Information.</p>

            <ul>

                <li>
                    Trademark
                    <p>“MSMELIST.COM”   and related icons and logos are registered trademarks or trademarks or service marks of MSMELIST.COM  in various jurisdictions and are protected under applicable copyright, trademark and other proprietary and intellectual property rights laws. The unauthorized adoption copying, modification, use or publication of these marks is strictly prohibited.</p>
                </li>
            <li> Copyright
                <p>All Web Site Content including Website Information is copyrighted to MSMELIST.COM  excluding any third-party content and any links to any third-party websites being made available or contained on the Web Site. User(s) may not use any trademark, service mark or logo of any independent third parties without prior written approval from such parties.</p>
            </li>
            </ul>
            <p>            User(s) acknowledge and agree that MSMELIST.COM  is not an arbiter or judge of disputes concerning intellectual property rights and as such cannot verify that User(s) selling or supplying merchandise or providing services on the Web Site have the right to sell the merchandise or provide the services offered by such User(s). MSMELIST.COM  encourages User(s) to assist MSMELIST.COM  in identifying listings on the Web Site which in the User(s) knowledge or belief infringe their rights. User(s) further acknowledge and agree by taking down a listing, MSMELIST.COM  does not and cannot be deemed to be endorsing a claim of infringement and further that in those instances in which MSMELIST.COM  declines to take down a listing, MSMELIST.COM  does not and cannot be deemed to be endorsing that the listing is not infringing of third party rights or endorsing any sale or supply of merchandise or services pursuant to or on account of such listing.</p>

            <p>MSMELIST.COM  respects the intellectual property rights of others, and we expect our User(s) to do the same. User(s) agree to not copy, download or reproduce the Web Site Content, Information or any other material, text, images, video clips, directories, files, databases or listings available on or through the Web Site ("MSMELIST.COM  Content") for the purpose of re-selling or re-distributing, mass mailing (via email, wireless text messages, physical mail or otherwise) operating a business competing with MSMELIST.COM , or otherwise commercially exploiting the MSMELIST.COM  Content unless otherwise agreed between the parties. Systematic retrieval of MSMELIST.COM  Content to create or compile, directly or indirectly, a collection, compilation, database or directory (whether through robots, spiders, automatic devices or manual processes) without written permission from MSMELIST.COM  is prohibited.</p>

            <p> In addition, use of the MSMELIST.COM  Content for any purpose not expressly permitted in this Agreement is prohibited and entitles MSMELIST.COM  to initiate appropriate legal action. User(s) agree that as a condition of their access to and use of MSMELIST.COM 's Services, they will not use MSMELIST.COM ’s Services to infringe the intellectual property rights of any third parties in any way. MSMELIST.COM  reserves the right to terminate the right of any User(s) to access or use MSMELIST.COM ’s Services for any infringement of the rights of third parties in conjunction with use of the MSMELIST.COM ’s Service, or in the event MSMELIST.COM  is of the believes that User(s) conduct is prejudicial to the interests of MSMELIST.COM , its affiliates, or other User(s), or for any other reason, at MSMELIST.COM ’s sole discretion, with or without cause.
            URL's/Sub-Domain
            URL’s/ Sub-domain names assigned by MSMELIST.COM  to User(s) (including both paid and free User(s)) are the exclusive property of MSMELIST.COM  and it cannot be assumed to be permanent in any case. MSMELIST.COM  reserves the right, without prior notice, at any point of time, to suspend or terminate or restrict access to or edit any URL's/Sub-domain names. IN ALL SUCH CASES, MSMELIST.COM  WILL NOT BE LIABLE TO ANY PARTY FOR ANY DIRECT, INDIRECT, SPECIAL OR OTHER CONSEQUENTIAL DAMAGES, INCLUDING, WITHOUT LIMITATION, ANY LOST PROFITS, BUSINESS INTERRUPTION OR OTHERWISE.
                MSMELIST.COM  may allow User(s) access to content, products or services offered by third parties through hyperlinks (in the form of word link, banners, channels or otherwise) to the websites offered by such third parties ("Third Party Websites"). MSMELIST.COM  advises its User(s) to read the terms and conditions of use and/or privacy policies applicable in respect of such Third Party Websites prior to using or accessing such Third Party Websites. Users acknowledge and agree that MSMELIST.COM  has no control over any content offered on Third Party Websites, does not monitor such Third Party Websites, and shall in no manner be deemed to be liable or responsible to any person for such Third Party Sites, or any content, products or services made available thereof.</p>


            <h5> VII. LINKS TO THIRD PARTY SITES </h5>

            <p>  Links to third party sites are provided on Web Site as a convenience to User(s). User(s) acknowledge and agree that MSMELIST.COM  does not have any control over the content of such websites and/ or any information, resources or materials provided therein.</p>

            <p> MSMELIST.COM  may allow User(s) access to content, products or services offered by third parties through hyperlinks (in the form of word link, banners, channels or otherwise) to the websites offered by such third parties ("Third Party Websites"). MSMELIST.COM  advises its User(s) to read the terms and conditions of use and/or privacy policies applicable in respect of such Third Party Websites prior to using or accessing such Third Party Websites. Users acknowledge and agree that MSMELIST.COM  has no control over any content offered on Third Party Websites, does not monitor such Third Party Websites, and shall in no manner be deemed to be liable or responsible to any person for such Third Party Sites, or any content, products or services made available thereof.</p>

            <h5>            VIII. TERMINATION</h5>

            <p>Most content and some of the features on the Web Site are made available to User(s) free of charge. However, MSMELIST.COM  reserves the right to terminate access to certain areas or features of the Web Site (to paying or registered User(s)) at any time without assigning any reason and with or without notice to such User(s). MSMELIST.COM  also reserves the universal right to deny access to particular User(s) to any or all of its services or content without any prior notice or explanation in order to protect the interests of MSMELIST.COM  and/ or other User(s) of the Web Site. MSMELIST.COM  further reserves the right to limit, deny or create different access to the Web Site and its features with respect to different User(s), or to change any or all of the features of the Web Site or introduce new features without any prior notice to User(s).</p>

    <p> MSMELIST.COM  reserves the right to terminate the membership/subscription of any User(s) temporarily or permanently for any of the following reasons:</p>
<ol>
    <li>       If any false information in connection with their account registered with MSMELIST.COM  is provided by such User(s), or if such User(s) are engaged in fraudulent or illegal activities/transactions.</li>
    <li>      If such User(s) breaches any provisions of the Agreement.</li>
    <li>     If such User(s) utilizes the Web Site to send spam messages or repeatedly publish the same product information.</li>
    <li>      If such User(s) posts any material that is not related to trade or business cooperation.</li>
    <li>    If such User(s) impersonates or unlawfully uses another person’s or business entity’s name to post information or conduct business in any manner.</li>
    <li>      If such User(s) is involved in unauthorized access, use, modification, or control of the Web Site database, network or related services.</li>
    <li>      If such User(s) obtains by any means another registered User(s) Username and/or Password.</li>
    <li>      Or any other User(s) activity that may not be in accordance with the ethics and honest business practices.</li>
    </ol>
           <p> If MSMELIST.COM  terminates the membership of any registered User(s) including those User(s) who have subscribed for the paid services of MSMELIST.COM , such person will not have the right to re-enrol or join the Web Site under a new account or name unless invited to do so in writing by MSMELIST.COM  In any case of termination, no subscription/membership fee/charges paid by the User(s) will be refunded. User(s) acknowledge that inability to use the Web Site wholly or partially for whatever reason may have adverse effect on their business. User(s) hereby agree that in no event shall MSMELIST.COM  be liable to any User(s) or any third parties for any inability to use the Web Site (whether due to disruption, limited access, changes to or termination of any features on the Web Site or otherwise), any delays, errors or omissions with respect to any communication or transmission, or any damage (direct, indirect, consequential or otherwise) arising from the use of or inability to use the Web Site or any of its features.</p>

<h5>            IX. REGISTERED USER(S)</h5>

            <p>To become a registered User(s) of the Web Site a proper procedure has been made available on the Web Site which is for the convenience of User(s) so that they can easily use the website.</p>

            <p> User(s) can become registered User(s) by filling an on-line registration form on the Web Site by providing the required information (including name, contact information, details of User(s) business, etc.). MSMELIST.COM  will establish an account ("Account") for the User(s) upon successful registration and will assign a user alias ("User ID") and password ("Password") for log-in access to the User(s)’s Account. MSMELIST.COM  may at its sole discretion assign to User(s) upon registration a web-based email or messaging account (“Email Account”) with limited storage space to send or receive emails or messages. Users will be responsible for the content of all the messages communicated through the account.</p>

            <p>  User(s) registering on the Web Site on behalf of business entities represent and warrant that: (a) they have the requisite authority to bind such business entity this Agreement; (b) the address provided by such User(s) at the time of registration is the principal place of business of such business entity; and (c) all other information provided to MSMELIST.COM  during the registration process is true, accurate, current and complete. For purposes of this provision, a branch or representative office of a User(s) will not be considered a separate entity and the principal place of business of the User(s) will be deemed to be that of its head office.</p>

            <p> User(s) agree that by registering on the Web Site, they consent to the inclusion of their personal data in MSMELIST.COM ’s on-line database and authorize MSMELIST.COM  to share such information with other User(s). MSMELIST.COM  may refuse registration and deny the membership and associated User ID and Password to any User(s) for whatever reason. MSMELIST.COM  may suspend or terminate a registered membership at any time without any prior notification in interest of MSMELIST.COM  or general interest of its User(s) without assigning any reason thereof and there shall arise no further liability on MSMELIST.COM  of whatsoever nature due to the suspension or termination of the User account. User(s) registered on the Web Site are in no manner a part of or affiliated to MSMELIST.COM .</p>

            <p>  User(s) further agree and consent to be contacted by MSMELIST.COM  through phone calls, SMS notifications or any other means of communication, in respect to the services provided by MSMELIST.COM  even if contact number(s) provided to MSMELIST.COM  upon registration are on Do Not Call Registry.</p>

   <h5>         X. DATA PROTECTION</h5>

<p>            Personal information supplied by User(s) during the use of the Web Site is governed by MSMELIST.COM ’s privacy policy ("Privacy Policy"). Please click here to know about the Privacy Policy..</p>

  <h5>          XI. POSTING YOUR CONTENT ON WEBSITE</h5>

           <p> Some content displayed on the Web Site is provided or posted by third parties. User(s) can post their content on some of the sections/services of the Web Site using the self-help submit and edit tools made at the respective sections of the Web Site. User(s) may need to register and/or pay for using or availing some of these services.</p>

            <p> User(s) understand and agree that MSMELIST.COM  in such case is not the author of the content and that neither MSMELIST.COM  nor any of its affiliates, directors, officers or employees have entered into any arrangement including any agreement of sale or agency with such third parties by virtue of the display of such content on the Web Site. User(s) further understand and agree MSMELIST.COM  is not responsible for the accuracy, propriety, lawfulness or truthfulness of any third party content made available on the Web Site and shall not be liable to any User(s) in connection with any damage suffered by the User(s) on account of the User(s)’s reliance on such content. MSMELIST.COM  shall not be liable for a User(s) activities on the Web Site, and shall not be liable to any person in connection with any damage suffered by any person as a result of any User's conduct.</p>

            <p>User(s) solely represent, warrant and agree to:</p>

            <ol>
                <li>provide MSMELIST.COM  with true, accurate, current and complete information to be displayed on the Web Site;</li>
                <li> maintain and promptly amend all information provided on the Web Site to keep it true, accurate, current and complete.</li>
            </ol>
            <p>User(s) hereby grant MSMELIST.COM  an irrevocable, perpetual, worldwide and royalty-free, sub-licensable (through multiple tiers) license to display and use all information provided by them in accordance with the purposes set forth in the Agreement and to exercise the copyright, publicity and database rights User(s) have in such material or information, in any form of media, third party copyrights, trademarks, trade secret rights, patents and other personal or proprietary rights affecting or relating to material or information displayed on the Web Site, including but not limited to rights of personality and rights of privacy, or affecting or relating to products that are offered or displayed on the Web Site (hereafter referred to as "Third Party Rights").</p>

            <p> User(s) hereby represent, warrants and agree that User(s) shall be solely responsible for ensuring that any material or information posted by User(s) on the Web Site or provided to the Web Site or authorized by the User(s) for display on the Web Site, does not, and that the products represented thereby do not, violate any Third Party Rights, or is posted with the permission of the owner(s) of such Third Party Rights. User(s) hereby represent, warrant and agree that they have the right to manufacture, offer, sell, import and distribute the products offered and displayed on the Web Site, and that such manufacture, offer, sale, importation and/or distribution of those products violates no Third Party Rights.</p>

            <p>User(s) agree that they will not use MSMELIST.COM  Content and/or MSMELIST.COM ’s Services to send junk mail, chain letters or spamming. Further, registered User(s) of the Web Site agree that they will not use the Email Account to publish, distribute, transmit or circulate any unsolicited advertising or promotional information. User(s) further hereby represent, warrant and agree that any content, material or information submitted to MSMELIST.COM  for display on the Web Site or transmitted or sought to be transmitted through MSMELIST.COM ’s Services does not and shall at no point:</p>

<ul>
           <li> Contain fraudulent information or make fraudulent offers of items or involve the sale or attempted sale of counterfeit or stolen items or items whose sales and/or marketing is prohibited by applicable law, or otherwise promote other illegal activities;
    <li> Belong to another person and to which User(s) do not have any right to;
    <li> Be part of a scheme to defraud other User(s) of the Web Site or for any other unlawful purpose;
    <li> Be intended to deceive or mislead the addressee about the origin of such messages or to communicate any information which is grossly offensive or menacing in nature;
    <li>  Relate to sale of products or services that infringe or otherwise abet or encourage the infringement or violation of any third party's copyright, patent, trademarks, trade secret or other proprietary right or rights of publicity or privacy, or any other Third Party Rights;</li>
    <li>   Violate any applicable law, statute, ordinance or regulation (including without limitation those governing export control, consumer protection, unfair competition, anti-discrimination or false advertising);</li>
    <li>    Be defamatory, abusive libellous, unlawfully threatening, unlawfully harassing, grossly harmful, indecent, seditious, blasphemous, paedophilic, hateful, racially, ethnically objectionable, disparaging, relating or encouraging money laundering or gambling, leading to breach of confidence, or otherwise unlawful or objectionable in any manner whatever;</li>
    <li>    Be vulgar, obscene or contain or infer any pornography or sex-related merchandising or any other content or otherwise promotes sexually explicit materials or is otherwise harmful to minors;</li>
    <li>     Promote discrimination based on race, sex, religion, nationality, disability, sexual orientation or age;</li>
    <li>      Contain any material that constitutes unauthorized advertising or harassment (including but not limited to spamming), invades anyone's privacy or encourages conduct that would constitute a criminal offense, give rise to civil liability, or otherwise violate any law or regulation;</li>
    <li>      Solicit business from any User(s) in connection with a commercial activity that competes with MSMELIST.COM ;</li>
    <li>       Threaten the unity, integrity, defence, security or sovereignty of India, friendly relations with foreign states, or public order or causes incitement to the commission of any cognisable offence or prevents investigation of any offence or is insulting any other nation.</li>
    <li>       Contain any computer viruses or other destructive devices and codes that have the effect of damaging, interfering with, intercepting or expropriating any software or hardware system, data or personal information or that are designed to interrupt, destroy or limit the functionality of any computer resource;</li>
    <li>       Link directly or indirectly to or include descriptions of goods or services that are prohibited under the prevailing law; or Otherwise create any liability for MSMELIST.COM  or its affiliates</li>
    <li>     MSMELIST.COM  reserves the right in its sole discretion to remove any material/content/photos/offers displayed on the Web Site which in MSMELIST.COM ’s reasonable belief is unlawful or could subject MSMELIST.COM  to liability or in violation of the Agreement or is otherwise found inappropriate in MSMELIST.COM 's opinion. MSMELIST.COM  reserves the right to cooperate fully with governmental authorities, private investigators and/or injured third parties in the investigation of any suspected criminal or civil wrongdoing.</li>
</ul>

     <p>       In connection with any of the foregoing, MSMELIST.COM  reserves the right to suspend or terminate the Account of any User(s) as deemed appropriate by MSMELIST.COM  at its sole discretion. User(s) agree that MSMELIST.COM  shall have no liability to any User(s), including liability in respect of consequential or any other damages, in the event MSMELIST.COM  takes any of the actions mentioned in this provision.</p>

            <p>            User(s) understand and agree that the Web Site acts as a content integrator and is not responsible for the information provided by User(s) displayed on the Web Site. MSMELIST.COM  does not have any role in developing the content displayed on the Web Site. MSMELIST.COM  has the right to promote any content including text, images, videos, brochures etc. provided by User(s) on various platforms owned by the company.</p>

            <h5>            XII. INTERACTION BETWEEN USERS</h5>

            <p>MSMELIST.COM  provides an on-line platform to facilitate interaction between buyers and suppliers of products and services. MSMELIST.COM  does not represent the seller or the buyer in transactions and does not charge any commission for enabling any transaction. MSMELIST.COM  does not control and is not liable to or responsible for the quality, safety, lawfulness or availability of the products or services offered for sale on the Web Site or the ability of the suppliers to complete a sale or the ability of buyers to complete a purchase. User(s) are cautioned that there may be risks of dealing with foreign nationals or people acting under false pretences on the Web Site. Web Site uses several tools and techniques to verify the accuracy and authenticity of the information provided by User(s). MSMELIST.COM  however, cannot and does not confirm each User(s)’s purported identity on the Web Site. MSMELIST.COM  encourages User(s) to evaluate the User(s) with whom they would like to deal with and use the common prudence while dealing with them.</p>

            <p>User(s) agree to fully assume the risks of any transactions ("Transaction Risks") conducted on the basis of any content, information or any other material provided on the Web Site and further assume the risks of any liability or harm of any kind arising due to or caused in connection with any subsequent activity relating to any products or services that are the subject of any such transaction.</p>

            <ul>
                <li>Such risks include, but are not limited to, misrepresentation of products and services, fraudulent schemes, unsatisfactory quality, failure to meet specifications, defective or dangerous products, unlawful products, delay or default in delivery or payment, cost miscalculations, breach of warranty, breach of contract and transportation accidents.</li>
                <li>Such risks also include the risks that the manufacture, importation, distribution, offer, display, purchase, sale and/or use of products or services offered or displayed on the Web Site may violate or may be asserted to violate Third Party Rights, and the risk that that User(s) may incur costs of defense or other costs in connection with third parties' assertion of Third Party Rights, or in connection with any claims by any party that they are entitled to defense or indemnification in relation to assertions of rights, demands or claims by Third Party Rights claimants.</li>
                <li>Such risks further include the risks that r the purchasers, end-users of products or others claiming to have suffered injuries or harms relating to product originally obtained by User(s) of the Web Site as a result of purchase and sale transactions in connection with using any content, information or any other material provided on the Web Site may suffer harms and/or assert claims arising from their use of such products.</li>
                <li>User(s) agree that MSMELIST.COM  shall not be liable or responsible for any damages, liabilities, costs, harms, inconveniences, business disruptions or expenditures of any kind that may occur/arise as a result of or in connection with any Transaction Risks. User(s) are solely responsible for all of the terms and conditions of the transactions conducted on, through or as a result of use of any content, information or any other material provided on the Web Site , including, without limitation, terms regarding payment, returns, warranties, shipping, insurance, fees, taxes, title, licenses, fines, permits, handling, transportation and storage. In the event of a dispute with any party to a transaction, User(s) agrees to release and indemnify MSMELIST.COM  (and our agents, affiliates, directors, officers and employees) from all claims, demands, actions, proceedings, costs, expenses and damages (including without limitation any actual, special, incidental or consequential damages) arising out of or in connection with such transaction</li>
            </ul>

        <p>MSMELIST.COM reserves the right to add/modify/discontinue any of the features offered on MSMELIST.COM ’s Services.</p>

          <h5>  XIII. LIMITATION OF LIABILITY/DISCLAIMER</h5>

            <p>The features and services on the Web Site are provided on an " as is " and " as available " basis, and MSMELIST.COM  hereby expressly disclaims any and all warranties, express or implied, including but not limited to any warranties of condition, quality, durability, performance, accuracy, reliability, merchantability or fitness for a particular purpose. All such warranties, representations, conditions, undertakings and terms are hereby excluded. MSMELIST.COM  makes no representations or warranties about the validity, accuracy, correctness, reliability, quality, stability or completeness of any information provided on or through the Web Site. MSMELIST.COM  does not represent or warrant that the manufacture, importation, distribution, offer, display, purchase, sale and/or use of products or services offered or displayed on the Web Site does not violate any Third Party Rights; and MSMELIST.COM  makes no representations or warranties of any kind concerning any product or service offered or displayed on the Web site. Any material downloaded or otherwise obtained through the Web site is at the User(s) sole discretion and risk and the User(s) is solely responsible for any damage to its computer system or loss of data that may result from the download of any such material. No advice or information, whether oral or written, obtained by the User(s) from Web Site or through or from the Web Site shall create or be deemed to create any warranty not expressly stated herein.</p>

            <p> Under no circumstances shall MSMELIST.COM  be held liable for any delay or failure or disruption of the content or services delivered through the Web Site resulting directly or indirectly from acts of nature, forces or causes beyond its reasonable control, including without limitation, Internet failures, computer, telecommunications or any other equipment failures, electrical power failures, strikes, labour disputes, riots, insurrections, civil disturbances, shortages of labour or materials, fires, flood, storms, explosions, Acts of God, natural calamities, war, governmental actions, orders of domestic or foreign courts or tribunals or non-performance of third parties. User(s) hereby agree to indemnify and save MSMELIST.COM , its affiliates, directors, officers and employees harmless, from any and all losses, claims, liabilities (including legal costs on a full indemnity basis) which may arise from their use of the Web Site (including but not limited to the display of User(s) information on the Web Site) or from User(s)’s breach of any of the terms and conditions of this Agreement. User(s) hereby further agree to indemnify and save MSMELIST.COM , its affiliates, directors, officers and employees harmless, from any and all losses, claims, liabilities (including legal costs on a full indemnity basis) which may arise from User(s)’s breach of any representations and warranties made by the User(s) to MSMELIST.COM .</p>

            <p>User(s) hereby further agree to indemnify and save MSMELIST.COM , its affiliates, directors, officers and employees harmless, from any and all losses, claims, liabilities (including legal costs on a full indemnity basis) which may arise, directly or indirectly, as a result of any claims asserted by Third Party Rights claimants or other third parties relating to products offered or displayed on the Web Site. User(s) hereby further agree that MSMELIST.COM  is not responsible and shall have no liability for any material posted by other User(s) or any other person, including defamatory, offensive or illicit material and that the risk of damage from such material rests entirely with the User(s). MSMELIST.COM  reserves the right, at its own expense, to assume the exclusive defense and control of any matter otherwise subject to indemnification by any User(s), in which event such User(s) shall cooperate with MSMELIST.COM  in asserting any available defences.</p>

            <p> MSMELIST.COM  shall not be liable for any special, direct, indirect, punitive, incidental or consequential damages or any damages whatsoever (including but not limited to damages for loss of profits or savings, business interruption, loss of information), whether in contract, negligence, tort, strict liability or otherwise or any other damages resulting from any of the following:</p>
            <ul>
                <li>The use or the inability to use the Web Site;
                <li>Any defect in goods, samples, data, information or services purchased or obtained from a User(s) or a third-party service provider through the web site;</li>
                <li>Violation of Third Party Rights or claims or demands that User(s) manufacture, importation, distribution, offer, display, purchase, sale and/or use of products or services offered or displayed on the web site may violate or may be asserted to violate Third Party Rights; or claims by any party that they are entitled to defense or indemnification in relation to assertions of rights, demands or claims by Third Party Rights claimants;</li>
                <li>Unauthorized access by third parties to data or private information of any User(s);</li>
                <li>Statements or conduct of any User(s) of the web site; or</li>
                <li>Any matters relating to Premium Services however arising, including negligence.</li>
            </ul>

            <h5>XIV. NOTICES</h5>


<p>            All notices or demands to or upon MSMELIST.COM  shall be effective if in writing and shall be deemed to be duly made when sent to MSMELIST.COM  to MSMELIST.COM, M/s Shiv Enterprises, B/134, Shivkunj, Lohia Nagar, Kankarbagh Colony, Patna-800020, Bihar, India.</p>

            <p>All notices or demands to or upon a User(s) shall be effective if either delivered personally, sent by courier, certified mail, by facsimile or email to the last-known correspondence, fax or email address provided by the User(s) on the Web Site, or by posting such notice or demand on an area of the Web Site that is publicly accessible without a charge.</p>


            <p>            Notice to a User(s) shall be deemed to be received by such User(s) if and when Web Site is able to demonstrate that communication, whether in physical or electronic form, has been sent to such User(s), or immediately upon Web Site’s posting such notice on an area of the Web Site that is publicly accessible without charge.</p>

            <h5> XV. GOVERNING LAW AND DISPUTE RESOLUTIONS</h5>

            <p> This Agreement and the Privacy Policy shall be governed in all respects by the laws of Indian Territory. MSMELIST.COM  considers itself and intends itself to be subject to the jurisdiction of the Courts of Patna, Bihar, India only. The parties to this Agreement hereby submit to the exclusive jurisdiction of the courts of Patna, Bihar, India.<p>

            <h5>XVI. MISCELLANEOUS</h5>
            <ul>
            <li>Headings for any section of the Agreement are for reference purposes only and in no way define, limit, construe or describe the scope or extent of such section.</li>
            <li>MSMELIST.COM ’s failure to enforce any right or failure to act with respect to any breach by a User(s) under the Agreement and/or Privacy Policy will not be deemed to be a MSMELIST.COM ’s waiver of that right or MSMELIST.COM 's waiver of the right to act with respect with subsequent or similar breaches.</li>

            <li> MSMELIST.COM  shall have the right to assign its obligations and duties in this Agreement and in any other agreement relating MSMELIST.COM ’s Services to any person or entity</li>
            <li> If any provision of this Agreement is held to be invalid or unenforceable, such provision shall be struck out and the remaining provisions of the Agreement shall be enforced.</li>
            <li> All calls to MSMELIST.COM are completely confidential. However, Your call may be recorded to ensure quality of service. Further, for training purpose and to ensure excellent customer service, calls from MSMELIST.COM may be monitored and recorded.</li>
            <li>Mr. Anil Prakash is the designated Grievance Officer in respect of MSMELIST.COM ’s Services. Any complaints or concerns with regards to any content on MSMELIST.COM ’s Services or any breach of this Agreement or Privacy Policy can be directed to the designated Grievance Officer in writing at MSMELIST.COM , 303, Block No-54, Sankalp Society, Sector- OMICRON-1, Greater Noida-201305, Uttar Pradesh, India or through an email signed with the electronic signature sent to grievances@msmelist.com</li>
            <li> The Agreement and the Privacy Policy constitute the entire agreement between the User(s) and MSMELIST.COM  with respect to access to and use of the Web Site, superseding any prior written or oral agreements in relation to the same subject matter herein</li>
            </ul>
            <h5>XVII. BIG BUYER ("BB") TERMS OF USE</h5>



            <ul>
                <li>Under BB banner, MSMELIST.COM  shall develop a microsite for the User(s) company ("BB Company") on the Web Site. MSMELIST.COM  shall display all the leads of the BB Company on the microsite, to enable the BB Company to find out suppliers in a short period of time.BB Company hereby grants MSMELIST.COM  the right to use its intellectual property on the microsite and Web Site in relation to the requirements posted by the BB Company on Web Site. It is clarified that all intellectual property rights in the logos, brands and trademarks of the BB Company used in relation to the above shall vest in the BB Company only.</li>
                <li>BB Company shall ensure that the contents provided to MSMELIST.COM  shall not contain any material which is offensive, derogator, explicit or perverse to any specific race, gender or class of persons or degrading to public conscience or morals and does not breach any applicable law.</li>
                <li>MSMELIST.COM  makes no representations or warranties to BB Company with respect to services provided by MSMELIST.COM  under BB banner.</li>
                <li>MSMELIST.COM  hereby disclaims all warranties express and implied, including the implied warranties of merchantability, fitness for a particular purpose, and non-infringement with respect to the services provided by MSMELIST.COM  under the BB banner.</li>
                <li>In no event shall MSMELIST.COM  be liable to BB Company for any special, exemplary, indirect, incidental, consequential, punitive damages or for any damages arising out of or in connection with respect to the above mentioned service.</li>
                <li>Apart from the said terms & conditions, the Agreement shall be deemed to form part and parcel of BB term and conditions.</li>
            </ul>


        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('msme.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/msme/about.blade.php ENDPATH**/ ?>