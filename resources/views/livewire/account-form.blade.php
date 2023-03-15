 <form class="pb-7 mb-7" wire:submit.prevent="submit">
     <!-- Title -->
     <div class="border-bottom border-color-1 mb-5">
         <h3 class="section-title mb-0 pb-2 font-size-25">Customer details</h3>
     </div>
     <!-- End Title -->

     <!-- Billing Form -->
     <div class="row">
         <div class="col-md-12">
             <!-- Input -->
             <div class="js-form-message mb-6">
                 <label class="form-label">
                     Full Name
                     <span class="text-danger">*</span>
                 </label>
                 <input wire:model="name" type="text" class="form-control" name="firstName"
                     data-msg="Please enter your frist name." data-error-class="u-has-error"
                     data-success-class="u-has-success" autocomplete="off">
                 @error('name')
                     <span class="error">{{ $message }}</span>
                 @enderror
             </div>
             <!-- End Input -->
         </div>

         <div class="w-100"></div>

         <div class="col-md-12">
             <!-- Input -->
             <div class="js-form-message mb-6">
                 <label class="form-label">
                     Company name
                 </label>
                 <input wire:model="company" type="text" class="form-control" name="companyName"
                     aria-label="Company Name" data-msg="Please enter a company name." data-error-class="u-has-error"
                     data-success-class="u-has-success">
                 @error('company')
                     <span class="error">{{ $message }}</span>
                 @enderror
             </div>
             <!-- End Input -->
         </div>



         <div class="col-md-8">
             <!-- Input -->
             <div class="js-form-message mb-6">
                 <label class="form-label">
                     Street address
                     <span class="text-danger">*</span>
                 </label>
                 <input wire:model="address" type="text" class="form-control" name="streetAddress"
                     aria-label="470 Lucy Forks" data-msg="Please enter a valid address." data-error-class="u-has-error"
                     data-success-class="u-has-success">
                 @error('address')
                     <span class="error">{{ $message }}</span>
                 @enderror
             </div>
             <!-- End Input -->
         </div>

         <div class="col-md-4">
             <!-- Input -->
             <div class="js-form-message mb-6">
                 <label class="form-label">
                     City
                 </label>
                 <input wire:model="city" type="text" class="form-control" aria-label="YC7B 3UT"
                     data-msg="Please enter a valid address." data-error-class="u-has-error"
                     data-success-class="u-has-success">
                 @error('city')
                     <span class="error">{{ $message }}</span>
                 @enderror
             </div>
             <!-- End Input -->
         </div>


         <div class="col-md-6">
             <!-- Input -->
             <div class="js-form-message mb-6">
                 <label class="form-label">
                     Email address
                     <span class="text-danger">*</span>
                 </label>
                 <input disabled wire:model="email" type="email" class="form-control" name="emailAddress"
                     placeholder="example@gmail.com" aria-label="jackwayley@gmail.com"
                     data-msg="Please enter a valid email address." data-error-class="u-has-error"
                     data-success-class="u-has-success">
                 @error('email')
                     <span class="error">{{ $message }}</span>
                 @enderror
             </div>
             <!-- End Input -->
         </div>

         <div class="col-md-6">
             <!-- Input -->
             <div class="js-form-message mb-6">
                 <label class="form-label">
                     Phone
                 </label>
                 <input wire:model="phone_number" type="text" class="form-control" aria-label="+1 (062) 109-9222"
                     data-msg="Please enter your last name." data-error-class="u-has-error"
                     data-success-class="u-has-success">
                 @error('phone_number')
                     <span class="error">{{ $message }}</span>
                 @enderror
             </div>
             <!-- End Input -->
         </div>


     </div>


     <div class="js-form-message mb-6">
         <button type="submit"
             class="btn btn-primary-dark-w btn-block btn-pill font-size-20 mb-3 py-3 text-white">Update</button>
     </div>
 </form>
