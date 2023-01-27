<?PHP 
    include('config/app.php');
    include('layout/header.php');
    include('layout/navbar.php');
?>
            <div class="header">
                <h1>Product Name</h1>
            </div>

            <div class="row">
                <div class="product-column">
                    <img src="images/camera_large.jpg">
                </div>
                <div class="product-column">
                    <h1>Product Information</h1>
                    
                    <div class="input-group">
                        <label for="size">Choose Size</label>
                        <select name="size">
                            <option>XS</option>
                            <option>S</option>
                            <option>M</option>
                            <option>L</option>
                            <option>XL</option>
                        </select>
                        
                        <label for="size">Extras</label>
                        <select name="size">
                            <option>Hat</option>
                            <option>Hoodie</option>
                            <option>Shoes</option>
                        </select>
                    </div>

                    <p>Price: $49,99</p>
                    <button style="width: 200px">Purchase</button>
                </div>
            </div>


            <div class="product-info">
                <h1>Product Info</h1>
                <div class="columns">
                    <div onclick="setOverview()" class="info info-active" id="overview">Overview</div>
                    <div onclick="setSpecs()" class="info" id="specs">Specifications</div>
                    <div onclick="setReviews()" class="info" id="reviews">Customer Reviews</div>
                </div>
                <div class="info-desc" id="overview-desc">
                    <p>OVERVIEW:</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia quisquam saepe alias praesentium, sit, ipsa minima ipsum, obcaecati eos esse dicta deserunt. Est praesentium consequuntur atque et dolores veritatis consectetur.</p>
                </div>
                <div class="info-desc" id="specs-desc">
                    <p>SPECIFICATIONS:</p>
                    <p>
                        <ul>
                            <li>XS</li>
                            <li>S</li>
                            <li>M</li>
                            <li>L</li>
                            <li>XS</li>
                        </ul>
                    </p>
                </div>
                <div class="info-desc" id="reviews-desc">
                    <p>REVIEWS:</p>
                    <p>This product has +100 positive reviews!</p>
                </div>
            </div>

            </div>
<?PHP 
    include('layout/footer.php')
?>  