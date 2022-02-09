<?php
echo"<div
                  class='
                    title
                    d-flex
                    flex-wrap
                    align-items-center
                    justify-content-between
                  '
                >
                  <div class='left'>
                    <h6 class='text-medium mb-30'>Sales History</h6>
                  </div>
                  
                </div>
         
                <div class='table-responsive'>
                  <table class='table top-selling-table'>
                    <thead>
                      <tr>
                        <th>
                          <h6 class='text-sm text-medium'>Products</h6>
                        </th>
                        <th class='min-width'>
                          <h6 class='text-sm text-medium'>
                            Category <i class='lni lni-arrows-vertical'></i>
                          </h6>
                        </th>
                        <th class='min-width'>
                          <h6 class='text-sm text-medium'>
                            Revenue <i class='lni lni-arrows-vertical'></i>
                          </h6>
                        </th>
                        <th class='min-width'>
                          <h6 class='text-sm text-medium'>
                            Status <i class='lni lni-arrows-vertical'></i>
                          </h6>
                        </th>
                        <th>
                          <h6 class='text-sm text-medium text-end'>
                            Actions <i class='lni lni-arrows-vertical'></i>
                          </h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <div class='product'>
                            <div class='image'>
                              <img
                                src='assets/images/products/product-mini-1.jpg'
                                alt=''
                              />
                            </div>
                            <p class='text-sm'>Bedroom</p>
                          </div>
                        </td>
                        <td>
                          <p class='text-sm'>Interior</p>
                        </td>
                        <td>
                          <p class='text-sm'>$345</p>
                        </td>
                        <td>
                          <span class='status-btn close-btn'>Pending</span>
                        </td>
                        <td>
                          <div class='action justify-content-end'>
                            <button class='edit'>
                              <i class='lni lni-pencil'></i>
                            </button>
                            <button
                              class='more-btn ml-10 dropdown-toggle'
                              id='moreAction1'
                              data-bs-toggle='dropdown'
                              aria-expanded='false'
                            >
                              <i class='lni lni-more-alt'></i>
                            </button>
                            <ul
                              class='dropdown-menu dropdown-menu-end'
                              aria-labelledby='moreAction1'
                            >
                              <li class='dropdown-item'>
                                <a href='#0' class='text-gray'>Remove</a>
                              </li>
                              <li class='dropdown-item'>
                                <a href='#0' class='text-gray'>Edit</a>
                              </li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class='product'>
                            <div class='image'>
                              <img
                                src='assets/images/products/product-mini-2.jpg'
                                alt=''
                              />
                            </div>
                            <p class='text-sm'>Arm Chair</p>
                          </div>
                        </td>
                        <td>
                          <p class='text-sm'>Interior</p>
                        </td>
                        <td>
                          <p class='text-sm'>$345</p>
                        </td>
                        <td>
                          <span class='status-btn warning-btn'>Refund</span>
                        </td>
                        <td>
                          <div class='action justify-content-end'>
                            <button class='edit'>
                              <i class='lni lni-pencil'></i>
                            </button>
                            <button
                              class='more-btn ml-10 dropdown-toggle'
                              id='moreAction1'
                              data-bs-toggle='dropdown'
                              aria-expanded='false'
                            >
                              <i class='lni lni-more-alt'></i>
                            </button>
                            <ul
                              class='dropdown-menu dropdown-menu-end'
                              aria-labelledby='moreAction1'
                            >
                              <li class='dropdown-item'>
                                <a href='#0' class='text-gray'>Remove</a>
                              </li>
                              <li class='dropdown-item'>
                                <a href='#0' class='text-gray'>Edit</a>
                              </li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>

                </div>";