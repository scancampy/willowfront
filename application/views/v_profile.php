<div class="page-content">
    <div class="card card-style" style=" padding-bottom: 20px;">
        <div class="content mb-0">                    
            <div class="input-style has-borders has-icon validate-field mb-4">
                <i class="fa fa-user"></i>
                <input type="text" class="form-control validate-name" id="nama_depan" name="nama_depan" placeholder="First Name" value="<?php if(trim($profile[0]->nama_depan =='')) { echo $profile[0]->nama_customer; } else { echo $profile[0]->nama_depan; } ?>">
                <label for="nama_depan" class="color-highlight">First Name</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em>(required)</em>
            </div>

            <div class="input-style has-borders has-icon validate-field mb-4">
                <i class="fa fa-user"></i>
                <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" placeholder="Last Name" value="<?php echo $profile[0]->nama_belakang; ?>">
                <label for="nama_belakang" class="color-highlight">Last Name</label>
            </div>
            
            <div class="input-style has-borders has-icon validate-field mb-4">
                <i class="fa fa-envelope"></i>
                <input type="email" class="form-control " readonly value="<?php echo $profile[0]->email_customer; ?>" id="email" name="email" placeholder="Email">
                <label for="email" name="email" class="color-highlight">Email</label>
            </div>

            <div class="input-style has-borders has-icon validate-field mb-4">
                <i class="fa fa-mobile-alt"></i>
                <input type="text" class="form-control validate-text" value="<?php echo $profile[0]->no_hp; ?>" id="no_hp" name="no_hp" placeholder="HP">
                <label for="no_hp" name="no_hp" class="color-highlight">HP</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em>(required)</em>
            </div>

            <div class="input-style has-borders has-icon mb-4">
                <i class="fa fa-address-book"></i>
                <textarea id="alamat_customer" placeholder="Enter your address" id="alamat_customer" name="alamat_customer"><?php echo trim($profile[0]->alamat_customer); ?></textarea>
                <label for="alamat_customer" class="color-highlight">Address</label>
            </div>

            <div class="input-style has-borders has-icon validate-field mb-4">
                <i class="fa fa-city"></i>
                <input type="text" class="form-control" id="kota_customer" name="kota_customer" placeholder="City" list="city" value="<?php echo $profile[0]->kota_customer; ?>">
                <label for="kota_customer" class="color-highlight">City</label>
            </div>

            <datalist id="city">
                <?php foreach($kota as $key => $value) { ?>
              <option value="<?php echo $value->nama; ?>"/>
              <?php } ?>
            </datalist>
            
            <button type="submit" value="btnsubmitprofile" name="btnsubmitprofile" class="btn btn-full btn-m shadow-l rounded-s font-600 bg-blue-dark mt-4">Update Profile</button>
            
            

        </div>
    </div>
</div>