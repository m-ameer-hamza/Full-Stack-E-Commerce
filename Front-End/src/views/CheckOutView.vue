<script setup></script>
<template>
  <form class="rounded-none">
    <div
      class="flex flex-col items-start px-20 pt-16 pb-32 w-full bg-white max-md:px-5 max-md:pb-24 max-md:max-w-full"
    >
      <div class="self-end w-full max-w-[1168px] max-md:max-w-full">
        <div class="flex gap-5 max-md:flex-col">
          <!-- Billing Details Section -->
          <section class="w-[43%] max-md:ml-0 max-md:w-full">
            <div
              class="flex flex-col mt-9 w-full max-md:mt-10 max-md:max-w-full"
            >
              <h1 class="self-start text-4xl font-semibold text-black">
                Billing details
              </h1>

              <div class="mt-9 max-md:max-w-full">
                <div class="flex gap-5 max-md:flex-col">
                  <div class="w-6/12 max-md:ml-0 max-md:w-full">
                    <div
                      class="flex flex-col grow text-base font-medium text-black max-md:mt-8"
                    >
                      <label for="firstName" class="self-start"
                        >First Name</label
                      >
                      <input
                        type="text"
                        id="firstName"
                        class="flex shrink-0 mt-6 bg-white rounded-xl border border-solid border-neutral-400 h-[75px] w-[211px] px-4"
                        required
                      />
                    </div>
                  </div>
                  <div class="ml-5 w-6/12 max-md:ml-0 max-md:w-full">
                    <div
                      class="flex flex-col grow text-base font-medium text-black max-md:mt-8"
                    >
                      <label for="lastName" class="self-start">Last Name</label>
                      <input
                        type="text"
                        id="lastName"
                        class="flex shrink-0 mt-6 bg-white rounded-xl border border-solid border-neutral-400 h-[75px] w-[211px] px-4"
                        required
                      />
                    </div>
                  </div>
                </div>
              </div>

              <label
                for="company"
                class="self-start mt-9 text-base font-medium text-black"
              >
                Company Name (Optional)
              </label>
              <input
                type="text"
                id="company"
                class="flex shrink-0 mt-6 max-w-full bg-white rounded-xl border border-solid border-neutral-400 h-[75px] w-[453px] px-4"
              />

              <label
                for="country"
                class="self-start mt-9 text-base font-medium text-black"
              >
                Country / Region
              </label>
              <select
                id="country"
                class="flex gap-5 justify-between px-7 py-7 mt-6 text-base bg-white rounded-xl border border-solid border-neutral-400 text-neutral-400 max-md:px-5 max-md:max-w-full w-[453px]"
              >
                <option>Sri Lanka</option>
              </select>

              <label
                for="street"
                class="self-start mt-9 text-base font-medium text-black"
              >
                Street address
              </label>
              <input
                type="text"
                id="street"
                class="flex shrink-0 mt-6 max-w-full bg-white rounded-xl border border-solid border-neutral-400 h-[75px] w-[453px] px-4"
                required
              />

              <label
                for="city"
                class="self-start mt-9 text-base font-medium text-black"
              >
                Town / City
              </label>
              <input
                type="text"
                id="city"
                class="flex shrink-0 mt-6 max-w-full bg-white rounded-xl border border-solid border-neutral-400 h-[75px] w-[453px] px-4"
                required
              />

              <label
                for="province"
                class="self-start mt-9 text-base font-medium text-black"
              >
                Province
              </label>
              <select
                id="province"
                class="flex gap-5 justify-between px-7 py-7 mt-6 text-base bg-white rounded-xl border border-solid border-neutral-400 text-neutral-400 max-md:px-5 max-md:max-w-full w-[453px]"
              >
                <option>Western Province</option>
              </select>
            </div>
          </section>

          <!-- Order Summary Section -->
          <section class="ml-5 w-[57%] max-md:ml-0 max-md:w-full">
            <div
              class="flex flex-col px-10 py-20 mx-auto w-full bg-white max-md:px-5 max-md:mt-10 max-md:max-w-full"
            >
              <div class="max-md:max-w-full">
                <div class="flex gap-5 max-md:flex-col">
                  <div class="w-[45%] max-md:ml-0 max-md:w-full">
                    <div
                      class="flex flex-col items-start w-full text-base font-medium text-black max-md:mt-10"
                    >
                      <h2 class="text-2xl">Product</h2>
                      <div
                        class="flex gap-2.5 items-center self-stretch mt-3.5 text-xs"
                      >
                        <p class="grow self-stretch text-base text-neutral-400">
                          Asgaard sofa
                        </p>
                        <span class="self-stretch my-auto">X</span>
                        <span class="self-stretch my-auto">1</span>
                      </div>
                      <p class="mt-6">Subtotal</p>
                      <p class="mt-6">Total</p>
                    </div>
                  </div>
                  <div class="ml-5 w-[55%] max-md:ml-0 max-md:w-full">
                    <div class="grow max-md:mt-10">
                      <div
                        class="flex flex-col items-end pl-9 text-base font-light text-black max-md:pl-5"
                      >
                        <h2 class="text-2xl font-medium">Subtotal</h2>
                        <p class="mt-3.5 max-md:mr-1">Rs. 250,000.00</p>
                        <p class="mt-6">Rs. 250,000.00</p>
                      </div>
                      <p class="mt-4 text-2xl font-bold text-yellow-600">
                        Rs. 250,000.00
                      </p>
                    </div>
                  </div>
                </div>
              </div>

              <hr
                class="shrink-0 mt-8 max-w-full h-px border border-solid border-zinc-300 w-[527px] max-md:mr-1"
              />

              <!-- Payment Options -->
              <div class="mt-6">
                <div class="flex gap-4 items-center">
                  <input
                    type="radio"
                    id="bankTransfer"
                    name="paymentMethod"
                    class="w-3.5 h-3.5"
                    checked
                  />
                  <label for="bankTransfer" class="text-base text-black">
                    Direct Bank Transfer
                  </label>
                </div>
                <p
                  class="mt-3 text-base font-light text-neutral-400 max-md:mr-1 max-md:max-w-full"
                >
                  Make your payment directly into our bank account. Please use
                  your Order ID as the payment reference. Your order will not be
                  shipped until the funds have cleared in our account.
                </p>

                <div class="flex gap-4 items-center mt-6">
                  <input
                    type="radio"
                    id="card"
                    name="paymentMethod"
                    class="w-3.5 h-3.5"
                  />
                  <label
                    for="card"
                    class="text-base font-medium text-neutral-400"
                  >
                    Direct Bank Transfer
                  </label>
                </div>

                <div class="flex gap-4 items-center mt-3">
                  <input
                    type="radio"
                    id="cod"
                    name="paymentMethod"
                    class="w-3.5 h-3.5"
                  />
                  <label
                    for="cod"
                    class="text-base font-medium text-neutral-400"
                  >
                    Cash On Delivery
                  </label>
                </div>
              </div>

              <p
                class="mt-6 text-base font-light text-black max-md:mr-1 max-md:max-w-full"
              >
                Your personal data will be used to support your experience
                throughout this website, to manage access to your account, and
                for other purposes described in our
                <strong>privacy policy.</strong>
              </p>

              <button
                type="submit"
                class="self-center px-16 py-4 mt-10 max-w-full text-xl text-black rounded-2xl border border-black border-solid w-[318px] max-md:px-5 hover:bg-black hover:text-white transition-colors"
              >
                Place order
              </button>
            </div>
          </section>
        </div>
      </div>

      <!-- Additional Fields -->
      <div class="mt-9 text-base font-medium text-black">
        <label for="zipcode">ZIP code</label>
        <input
          type="text"
          id="zipcode"
          class="flex shrink-0 mt-6 max-w-full bg-white rounded-xl border border-solid border-neutral-400 h-[75px] w-[453px] px-4"
          required
        />
      </div>

      <div class="mt-9 text-base font-medium text-black">
        <label for="phone">Phone</label>
        <input
          type="tel"
          id="phone"
          class="flex shrink-0 mt-6 max-w-full bg-white rounded-xl border border-solid border-neutral-400 h-[75px] w-[453px] px-4"
          required
        />
      </div>

      <div class="mt-9 text-base font-medium text-black">
        <label for="email">Email address</label>
        <input
          type="email"
          id="email"
          class="flex shrink-0 mt-6 max-w-full bg-white rounded-xl border border-solid border-neutral-400 h-[75px] w-[453px] px-4"
          required
        />
      </div>

      <textarea
        placeholder="Additional information"
        class="px-7 py-7 mt-16 mb-0 max-w-full text-base bg-white rounded-xl border border-solid border-neutral-400 text-neutral-400 w-[453px] max-md:px-5 max-md:mt-10 max-md:mb-2.5"
        rows="4"
      ></textarea>
    </div>
  </form>

  <script>
    document.querySelector("form").addEventListener("submit", (e) => {
      e.preventDefault();
      // Handle form submission
      console.log("Form submitted");
    });
  </script>
</template>
