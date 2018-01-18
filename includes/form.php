<?php
  $errors = [];
  $missing = [];
  // check if the form has been submitted
  if (isset($_POST['signup'])) {
    // Expected fields
    $expected = ['firstName','lastName','address','city','state','zip','month','day','year','email','format','comment'];
    // Required fields
    $required = ['firstName','email','format'];
    // set default values for variables that be unset
    if(!isset($_POST['format'])) {
      $_POST['format'] = '';
    }
    if (!isset($_POST['agreed'])) {
      $_POST['agreed'] = '';
      $errors['agreed'] = true;
    }
    // create variables for fields
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $year = $_POST['year'];
    $email = $_POST['email'];
    $format = $_POST['format'];
    $agreed = $_POST['agreed'];
    $message = $_POST['comment'];

    // Create and execute SQL for insert
    if (!$errors && !$missing) {
        $insertInfo = "INSERT INTO email_list (Email_address, First_name, Last_name, Birth_month, Birth_day, Birth_year, Address, City, State, ZIP, Format)
                        VALUES ('$email', '$firstName', '$lastName', '$month', '$day', '$year', '$address', '$city', '$state', '$zip', '$format') ";
    }
    $conn->query($insertInfo);
    // email processing script if comment is set
    if (isset($message)) {
      $to = 'fakeaddress@email.com';
      $subject = 'Comment from Foo Fighters Discography';
      $message = '';
      $headers = "From: Foo Fighters Discographt<feedback@example.com>\r\n";
      $headers .= 'Content-Type: text/plain; charset=utf-8';
      // limit line length to 70 characters
      $message = wordwrap($message, 70);
      $mailSent = mail($to, $subject, $message, $headers);
    }
    include 'processmail.php';
    if (isset($insertInfo) && !$errors && !$missing) {
      echo "<script>window.location.assign('thank_you.php')</script>";
    }
  }
?>

<?php if ($missing || $errors) { ?>
  <p class="warning">Please fix the field(s) indicated below</p>
<?php } ?>


<form method="post" id="signup">
  <fieldset class="form-group">
    <legend><i class="glyphicon glyphicon-user"></i> Name</legend>
    <label for="firstName">First Name*
      <?php if ($missing && in_array('firstName', $missing)) { ?>
        <span class="warning">Please enter your first name</span>
      <?php } ?>
    </label>
    <input name="firstName" class="form-control" type="text" id="firstName"
      <?php if ($missing || $errors) {
        echo 'value="' . htmlentities($firstName) . '"';
      } ?> >
    <label for="lastName" class="control-label">Last Name</label>
    <input name="lastName" class="form-control" type="text" id="lastName"
    <?php if ($missing || $errors) {
      echo 'value="' . htmlentities($lastName) . '"';
    } ?> >
  </fieldset>
  <fieldset class="location form-group">
    <legend><i class="glyphicon glyphicon-map-marker"></i> Location</legend>
    <label for="address">Address</label>
    <input name="address" type="text" class="form-control" id="address"
    <?php if ($missing || $errors) {
      echo 'value="' . htmlentities($address) . '"';
    } ?> >
    <label for="city">City</label>
    <input name="city" type="text" class="form-control" id="city"
    <?php if ($missing || $errors) {
      echo 'value="' . htmlentities($city) . '"';
    } ?> >
    <label for="state">State</label>
    <select name="state" id="state" class="form-control">
      <option value="">Select State</option>
      <option value="AL">Alabama</option>
      <option value="AK">Alaska</option>
      <option value="AZ">Arizona</option>
      <option value="AR">Arkansas</option>
      <option value="CA">California</option>
      <option value="CO">Colorado</option>
      <option value="CT">Connecticut</option>
      <option value="DE">Delaware</option>
      <option value="FL">Florida</option>
      <option value="GA">Georgia</option>
      <option value="HI">Hawaii</option>
      <option value="ID">Idaho</option>
      <option value="IL">Illinois</option>
      <option value="IN">Indiana</option>
      <option value="IA">Iowa</option>
      <option value="KS">Kansas</option>
      <option value="KY">Kentucky</option>
      <option value="LA">Louisiana</option>
      <option value="ME">Maine</option>
      <option value="MD">Maryland</option>
      <option value="MA">Massachusetts</option>
      <option value="MI">Michigan</option>
      <option value="MN">Minnesota</option>
      <option value="MS">Mississippi</option>
      <option value="MO">Missouri</option>
      <option value="MT">Montana</option>
      <option value="NE">Nebraska</option>
      <option value="NV">Nevada</option>
      <option value="NH">New Hampshire</option>
      <option value="NJ">New Jersey</option>
      <option value="NM">New Mexico</option>
      <option value="NY">New York</option>
      <option value="NC">North Carolina</option>
      <option value="ND">North Dakota</option>
      <option value="OH">Ohio</option>
      <option value="OK">Oklahoma</option>
      <option value="OR">Oregon</option>
      <option value="PA">Pennsylvania</option>
      <option value="RI">Rhode Island</option>
      <option value="SC">South Carolina</option>
      <option value="SD">South Dakota</option>
      <option value="TN">Tennessee</option>
      <option value="TX">Texas</option>
      <option value="UT">Utah</option>
      <option value="VA">Vermont</option>
      <option value="VT">Virginia</option>
      <option value="WA">Washington</option>
      <option value="WV">West Virginia</option>
      <option value="WI">Wisconsin</option>
      <option value="WY">Wyoming</option>
    </select>
    <label for="zip">ZIP Code</label>
    <input class="form-control" name="zip" type="text" id="zip"
    <?php if ($missing || $errors) {
      echo 'value="' . htmlentities($zip) . '"';
    } ?> >
  </fieldset>
  <fieldset class="age form-group">
    <!--DO NOT CHANGE AGE FORM--><!-- NO! I DO WHAT I WANT! -->
    <legend><i class="glyphicon glyphicon-gift"></i> Birthday</legend>
    <div class="form-inline">
      <label for="month">Month</label>
      <select class="form-control input-sm" name="month" id="birthMonth">
        <option value="">MM</option>
        <option value="01">January</option>
        <option value="02">February</option>
        <option value="03">March</option>
        <option value="04">April</option>
        <option value="05">May</option>
        <option value="06">June</option>
        <option value="07">July</option>
        <option value="08">August</option>
        <option value="09">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
      </select>
      <label for="day">Day</label>
      <select class="form-control input-sm" name="day" id="birthDay">
        <option value="">DD</option>
        <option value="01">01</option>
        <option value="02">02</option>
        <option value="03">03</option>
        <option value="04">04</option>
        <option value="05">05</option>
        <option value="06">06</option>
        <option value="07">07</option>
        <option value="08">08</option>
        <option value="09">09</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
      </select>
      <label for="year">Year</label>
      <select class="form-control input-sm" name="year" id="birthYear">
        <option value="">YYYY</option>
        <option value="2017">2017</option>
        <option value="2016">2016</option>
        <option value="2015">2015</option>
        <option value="2014">2014</option>
        <option value="2013">2013</option>
        <option value="2012">2012</option>
        <option value="2011">2011</option>
        <option value="2010">2010</option>
        <option value="2009">2009</option>
        <option value="2008">2008</option>
        <option value="2007">2007</option>
        <option value="2006">2006</option>
        <option value="2005">2005</option>
        <option value="2004">2004</option>
        <option value="2003">2003</option>
        <option value="2002">2002</option>
        <option value="2001">2001</option>
        <option value="2000">2000</option>
        <option value="1999">1999</option>
        <option value="1998">1998</option>
        <option value="1997">1997</option>
        <option value="1996">1996</option>
        <option value="1995">1995</option>
        <option value="1994">1994</option>
        <option value="1993">1993</option>
        <option value="1992">1992</option>
        <option value="1991">1991</option>
        <option value="1990">1990</option>
        <option value="1989">1989</option>
        <option value="1988">1988</option>
        <option value="1987">1987</option>
        <option value="1986">1986</option>
        <option value="1985">1985</option>
        <option value="1984">1984</option>
        <option value="1983">1983</option>
        <option value="1982">1982</option>
        <option value="1981">1981</option>
        <option value="1980">1980</option>
        <option value="1979">1979</option>
        <option value="1978">1978</option>
        <option value="1977">1977</option>
        <option value="1976">1976</option>
        <option value="1975">1975</option>
        <option value="1974">1974</option>
        <option value="1973">1973</option>
        <option value="1972">1972</option>
        <option value="1971">1971</option>
        <option value="1970">1970</option>
        <option value="1969">1969</option>
        <option value="1968">1968</option>
        <option value="1967">1967</option>
        <option value="1966">1966</option>
        <option value="1965">1965</option>
        <option value="1964">1964</option>
        <option value="1963">1963</option>
        <option value="1962">1962</option>
        <option value="1961">1961</option>
        <option value="1960">1960</option>
        <option value="1959">1959</option>
        <option value="1958">1958</option>
        <option value="1957">1957</option>
        <option value="1956">1956</option>
        <option value="1955">1955</option>
        <option value="1954">1954</option>
        <option value="1953">1953</option>
        <option value="1952">1952</option>
        <option value="1951">1951</option>
        <option value="1950">1950</option>
        <option value="1949">1949</option>
        <option value="1948">1948</option>
        <option value="1947">1947</option>
        <option value="1946">1946</option>
        <option value="1945">1945</option>
        <option value="1944">1944</option>
        <option value="1943">1943</option>
        <option value="1942">1942</option>
        <option value="1941">1941</option>
        <option value="1940">1940</option>
        <option value="1939">1939</option>
        <option value="1938">1938</option>
        <option value="1937">1937</option>
        <option value="1936">1936</option>
        <option value="1935">1935</option>
        <option value="1934">1934</option>
        <option value="1933">1933</option>
        <option value="1932">1932</option>
        <option value="1931">1931</option>
        <option value="1930">1930</option>
        <option value="1929">1929</option>
        <option value="1928">1928</option>
        <option value="1927">1927</option>
        <option value="1926">1926</option>
        <option value="1925">1925</option>
        <option value="1924">1924</option>
        <option value="1923">1923</option>
        <option value="1922">1922</option>
        <option value="1921">1921</option>
        <option value="1920">1920</option>
        <option value="1919">1919</option>
      </select>
    </div>
  </fieldset>
  <fieldset class="email form-group">
    <legend><i class="glyphicon glyphicon-envelope"></i> Email Preferences</legend>
    <label for="email">Email Address*
      <?php if ($missing && in_array('email', $missing)) { ?>
        <span class="warning">Please enter your email address</span>
      <?php } ?>
    </label>
    <input name="email" type="text" id="email" class="form-control"
      <?php if ($missing || $errors) {
        echo 'value="' . htmlentities($email) . '"';
      } ?> ><br>
    <label for="format">Format*
      <?php if ($missing && in_array('format', $missing)) { ?>
        <span class="warning">Please select a format</span>
      <?php } ?>
    </label><br>
    <input name="format" type="radio" value="Text" id="textRadio"
      <?php if ($_POST && $_POST['format'] == 'Text') {
        echo 'checked';
      } ?> >
    <label for="textRadio">Plain Text</label><br>
    <input name="format" type="radio" value="HTML" id="htmlRadio"
      <?php if ($_POST && $_POST['format'] == 'HTML') {
        echo 'checked';
      } ?> >
    <label for="htmlRadio">HTML</label><br><br>
    <input type="checkbox" name="agreed" id="agreed">
    <label for="agreed"> I Agree to the Terms of Service*
      <?php if (isset($errors['agreed'])) { ?>
        <span class="warning">Please accept Terms of Service</span>
      <?php } ?>
    </label>

  </fieldset>
  <fieldset class="form-group">
    <legend><i class="glyphicon glyphicon-comment"></i> Comments</legend>
    <label for="comment">Comment</label>
    <textarea class="form-control" name="comment" id="comment"></textarea><br>
    <p>* Required fields<p>
    <input type="submit" class="btn btn-lg btn-default" name="signup" value="Sign Up">
  </fieldset>
</form>
