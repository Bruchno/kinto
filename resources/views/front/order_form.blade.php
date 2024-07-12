<div class="col-md-6">
  <div class="form_container">
    <div class="heading_container">
      <h2>
        Наші контакти
      </h2>
    </div>
    <!-- <form action="" id="order_form"> -->
      @csrf
      <a href="https://maps.app.goo.gl/f299CE6VPCpLfWFH6" target="_blank">
      <div>
        <!-- <input type="text" name="name" class="form-control" placeholder="Your Name" /> -->
        <input type="text" name="name" class="form-control active-input" value="м. Київ" readonly/>
      </div>

      <div>
        <!-- <input type="text" name="phone" class="form-control" placeholder="Phone Number" required/> -->
        <input type="text" name="phone" class="form-control active-input" value="вул. Петра Сагайдачного, 25 Б" readonly/>
      </div>
    </a>
    <a href="tel:+380985554433">
      <div>
        <input type="text" name="email" class="form-control active-input" value="тел: 044 246 73 50" readonly />
        <!-- <input type="email" name="email" class="form-control" placeholder="Your Email" /> -->
      </div>
    </a>
      <!-- <div>
        <select class="form-control nice-select wide" name="count_person">
          <option value="" disabled selected>
            How many persons?
          </option>
          <option value="">
            2
          </option>
          <option value="">
            3
          </option>
          <option value="">
            4
          </option>
          <option value="">
            5
          </option>
        </select>
      </div>
      <div>
        <input type="datetime-local" class="form-control" name="date_order">
      </div> -->
      <div class="btn_box">
        <button data-toggle="modal" data-target="#exampleModal"><!-- <button id="order_send"> -->
          Зв'язатися'
        </button>
      </div>
    <!-- </form> -->
  </div>
</div>
