<div id="home-list" class="home-list-wrap">



                        <div class="home-list-ct">



                            <h2 class="h2_line">Website Bán Hàng<a class="link" href="#">Xem chi tiết ></a></h2>



                            <div class="home-slider">

                                <?php
                                    $sql = 'SELECT * FROM detail as d, category as c WHERE d.cateid=c.cateid AND d.cateid=2 AND d.status="Y" ORDER BY detailid DESC';
                                    $query = $mysqli->query($sql);
                                    while ($data = $query -> fetch_assoc()) {
                                        $link = '/' .$data["cateid"]. '-' .noneUniAlias($data["cate_name"], true). '/' .$data["detailid"]. '-' .noneUniAlias($data["detail_name"], true). '.html';
                                        echo '<div class="home-slider-item">

                                            <a class="home-slider-item-link" href="'.$link.'">

                                                <img src="/data/detail_img/'.$data["detail_feature"].'" alt="#" />

                                                <span class="catalog">'.$data["detail_intro"].'</span>

                                                <span class="code">'.$data["detail_name"].'</span>

                                            </a>

                                        </div>';
                                    }
                                ?>

                            </div>



                        </div>



                    </div>
