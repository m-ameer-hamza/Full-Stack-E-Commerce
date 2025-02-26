<script></script>

<template>
  <!-- Cart Details -->
  <div class="flex flex-col rounded-none">
    <div class="px-20 py-16 w-full bg-white max-md:px-5 max-md:max-w-full">
      <div class="flex gap-5 max-md:flex-col">
        <!-- Product Table -->
        <div class="w-[68%] max-md:w-full">
          <div class="overflow-x-auto">
            <table class="min-w-full text-base text-black">
              <thead class="bg-orange-50">
                <tr>
                  <th class="px-6 py-4 text-left">Product</th>
                  <th class="px-6 py-4 text-left">Price</th>
                  <th class="px-6 py-4 text-left">Quantity</th>
                  <th class="px-6 py-4 text-left">Subtotal</th>
                  <th class="px-6 py-4 text-left">Remove</th>
                </tr>
              </thead>
              <tbody>
                <tr class="border-b">
                  <!-- Product Column -->
                  <td class="px-6 py-4 flex items-center">
                    <img
                      loading="lazy"
                      src="https://cdn.builder.io/api/v1/image/assets/52cb9a1f112445149b6b31ac05588017/f4c4132ec90106414ee701f7fb52c3a1516281cf031758a17b6254c98e4d8448?apiKey=52cb9a1f112445149b6b31ac05588017&"
                      alt="Asgaard sofa product image"
                      class="object-contain w-24 h-24 mr-4"
                    />
                    <span>Asgaard sofa</span>
                  </td>
                  <!-- Price Column -->
                  <td class="px-6 py-4">Rs. 250,000.00</td>
                  <!-- Quantity Column -->
                  <td class="px-6 py-4">
                    <input
                      type="number"
                      value="1"
                      class="w-16 border border-neutral-400 rounded-md text-center"
                    />
                  </td>
                  <!-- Subtotal Column -->
                  <td class="px-6 py-4">Rs. 250,000.00</td>
                  <!-- Remove Column -->
                  <td class="px-6 py-4">
                    <button
                      aria-label="Remove item"
                      class="focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                      <img
                        loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/52cb9a1f112445149b6b31ac05588017/73d80f01b0cdb1210a1c0aac3f437db9c22d7bbbe5b14bb4e8efdde8828e5edb?apiKey=52cb9a1f112445149b6b31ac05588017&"
                        alt="Remove item icon"
                        class="object-contain w-7 h-7"
                      />
                    </button>
                  </td>
                </tr>
                <!-- Additional rows can be added here -->
              </tbody>
            </table>
          </div>
        </div>

        <!-- Cart Totals -->
        <div class="w-[32%] max-md:w-full">
          <div
            class="flex flex-col px-20 pt-4 pb-20 mx-auto bg-orange-50 max-md:px-5 max-md:mt-10"
          >
            <h2 class="self-center text-3xl font-semibold text-black">
              Cart Totals
            </h2>
            <div class="flex gap-5 justify-between mt-16 max-md:mt-10">
              <div
                class="flex flex-col self-start text-base font-medium text-black whitespace-nowrap"
              >
                <div>Subtotal</div>
                <div class="self-start mt-8">Total</div>
              </div>
              <div class="flex flex-col">
                <div class="self-end text-base text-black">Rs. 250,000.00</div>
                <div class="mt-8 text-xl font-medium text-black">
                  Rs. 250,000.00
                </div>
              </div>
            </div>
            <button
              class="px-14 py-4 mt-11 mr-2.5 ml-3 text-xl text-black rounded-2xl border border-black border-solid max-md:px-5 max-md:mt-10 max-md:ml-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
              Check Out
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
