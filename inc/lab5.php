<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="lab5.css">
    <title>Functions Test Page</title>
    <?php require_once 'ctec_functions.php';?>
</head>
<body>
    <!-- FUNCTION 1 -->
    <section id="Function1">
        <h1>Test for Function 1</h1>
        <form method="POST">
        <label class="exposition" for="postOrGet">Does this form use a post or a get request?</label>
        <select name="postOrGet" id="postOrGet">
            <option value="post">Post</option>
            <option value="get">Get</option>
        </select>
        <button>Find out!</button>
        </form>
        <?php
        if (isset($_POST['postOrGet'])){
            if (is_post_request($_POST['postOrGet'])){
                echo '<p>It uses post method!</p>';
            }elseif (is_get_request($_POST['postOrGet'])){
                echo '<p>It uses get method!</p>';
            } // end elseif
        } // end if isset
        ?>
    </section>
    <!-- FUNCTION 2 -->
    <section id="function2">
        <h1>Test for Function 2</h1>
        <form method="GET">
        <label class="exposition" for="getOrPost">Does this form use a post or a get request?</label>
        <select name="getOrPost" id="getOrPost">
            <option value="post">Post</option>
            <option value="get">Get</option>
        </select>
        <button>Find out!</button>
        </form>
        <?php
        if (isset($_GET['getOrPost'])){
            if (is_get_request($_GET['getOrPost'])){
                echo '<p>It uses get method!</p>';
            }elseif (is_get_request($_GET['getOrPost'])){
                echo '<p>It uses post method!</p>';
            } // end elseif
        } // end if isset
        ?>
    </section>
    <!-- FUNCTION 3 -->
    <section id="function3">
        <h1>Test for Function 3</h1>
        <p class="exposition">The special charcters in the following text will be escaped in the html source code using htmlspecialchars:
            <?php
                $hooray = '<div><<<<<< HOORAY FOR DOGS! >>>>>>></div>';
                echo '<pre>';
                echo (h($hooray));
                echo '</pre>';
            ?>
        </p>
    </section>
    <!-- FUNCTION 4 -->
    <!-- FUNCTION 5 -->
    <section id="function4and5">
        <h1>Test for Functions 4 and 5</h1>
        <p class="exposition">The string "Yabba! Dabba! Doo!" will be encoded twice below to remove all non-alphanumeric characters (except for hyphens and underscores).</p>
        <p>First, using urlencode:<p>
            <?php 
                $fred = 'Yabba! Dabba! Doo!';
                echo '<pre>';
                echo (u($fred));
                echo '</pre>';
            ?>
        <p>Next, using rawurlencode:</p>
            <?php
                echo '<pre>';
                echo (u($fred));
                echo '</pre>';
            ?>
    </section>
    <!-- FUNCTION 6 -->
    <!-- FUNCTION 7 -->
    <section id="function6and7">
        <h1>Test for Functions 6 and 7</h1>
        <p class="exposition">Do you think the string "     " is blank inside?</p>
            <?php
            $emptyString = "     ";
            if (is_blank($emptyString)){
                echo 'Why yes! It is blank!';
            } else {
                echo 'Who knows? I sure don\'t!';
            }
            ?>
        <p class="exposition">On the other hand, do you think that same string "     " has data present?</p>
            <?php
            if (has_presence($emptyString)){
                echo 'Why no! I do not!';
            } else {
                echo 'You goof! I just told you it is blank! Sheesh!';
            }
            ?>
        <p class="exposition">Do you think the string "  Yippee!   " is blank inside?</p>
            <?php
            $presenceString = "  Yippee!   ";
            if (is_blank($presenceString)){
                echo 'Why yes! It is blank!';
            } else {
                echo 'What? You absolute fool! Of course it isn\'t blank!';
            }
            ?>
        <p class="exposition">On the other hand, do you think the string "  Yippee!   " has data present?</p>
            <?php
            if (has_presence($presenceString)){
                echo 'Of course! Who do you think I am, some rube?';
            } else {
                echo 'Oh shoot, what do I know.';
            }
            ?>
    </section>
    <!-- FUNCTION 8 -->
    <!-- FUNCTION 9 -->
    <!-- FUNCTION 10 -->
    <!-- FUNCTION 11 -->
    <section id="functions8-9-10and11">
        <h1>Test for Functions 8, 9, 10, and 11</h1>

        <?php
            if (isset($_POST['countString'])){ 
                $countString = $_POST['countString'];
            } else {
                $countString = '';
            }
            $min = 5;
            $max = 50;
            $exact = 25;
        ?>

        <form method="POST">
            <p>
            Enter a short phrase or sentence here:
            <input type="text" name="countString" id="countString" value="<?php if (isset($countString))echo $countString;?>">
            <input type="submit">
            </p> 
        </form>

        <?php
            if (isset($_POST['countString'])){
                if (is_post_request($_POST['countString'])) {
        ?>
                    <p class="exposition">Does "<?=$countString?>" have a length greater than 5 characters?</p>
                        <?php
                        if (isset($countString)){
                            if (has_length_greater_than($countString,$min)){
                                echo '<p>Yes, it is longer than 5.</p>';
                            } else {
                                echo '<p>No, it is not longer than 5.</p>';
                            }
                        }
                        ?>
                    <p class="exposition">Does "<?=$countString?>" have a length less than 50 characters?</p>
                        <?php
                            if (isset($countString)){
                                if (has_length_less_than($countString,$max)){
                                    echo '<p>Yes, it is shorter than 50.</p>';
                                } else {
                                    echo '<p>No, it is longer than 50.</p>';
                                }
                            }
                            ?>
                    <p class="exposition">Does "<?=$countString?>" have a length of exactly 25 characters?</p>
                        <?php
                            if (isset($countString)){
                                if (has_length_exactly($countString,$exact)){
                                    echo '<p>Yes, it is exactly 25 characters long.</p>';
                                } else {
                                    echo '<p>No, it is not 25 characters long.</p>';
                                }
                            }
                        ?>
                    <p class="exposition">Now let's test out all three conditions listed above at once: does the string you entered meet them all?</p>
                        <?php
                            if (isset($countString)){
                            $options = ['min' => $min, 'max' => $max, 'exact' => $exact];
                            if (has_length($countString,$options)){
                                echo 'This string meets all of the above 3 conditions!';
                            } else {
                                echo 'This string does not meet all of the above 3 condtions!';
                            }
                            }
                        ?>
        <?php
            }
            }
        ?>       
    </section>
    <!-- FUNCTION 12 -->
    <!-- FUNCTION 13 -->
    <section id="sections12and13">
        <h1>Test for Functions 12 and 13</h1>
        <?php 
            $fib = [0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55];

            if (isset($_POST['favNum'])){ 
                $favNum = $_POST['favNum'];
            } else {
                $favNum = '';
            }
        ?>
        <p class="exposition">Look at this awesome set of numbers: <?='['.implode(', ',$fib).']'?><p>
        <form method="POST">
            <p>
            Now enter your favorite number here:
            <input type="number" name="favNum" id="favNum" value="<?php if (isset($favNum))echo $favNum;?>">
            <input type="submit">
            </p> 
        </form>

        <?php
            if (isset($_POST['favNum'])){
                if (is_post_request($_POST['favNum'])) {
        ?>
        <p class="exposition">Is your favorite number included in that awesome set?</p>
        <?php
            if (has_inclusion_of($favNum,$fib)){
                echo 'Yes, your favorite number is included!';
            } else {
                echo 'No, your favorite number is not included.';
            }
        ?>
        <p class="exposition">Is your favorite number excluded from that awesome set?</p>
        <?php
            if (has_exclusion_of($favNum,$fib)){
                echo 'Yes, your favorite number is excluded!';
            } else {
                echo 'No, your favorite number is not excluded.';
            }
        ?>
        <?php
                }
            }
        ?>

    </section>
    <!-- FUNCTION 14 -->
    <!-- FUNCTION 15 -->
    <!-- FUNCTION 16 -->
    <section>
        <h1>Test for Function 14, 15, and 16</h1>
        <?php
            if (isset($_POST['email'])){
                $email = $_POST['email'];
            } else {
                $email = '';
            }

            $errors = [];
        ?>
        <form method="POST">
        <p class="exposition">Give me a valid email address please!</p>
        <label>E-mail:</label>
        <input type="email" name="email" id="email"> 
        </form>
        <?php
            if (isset($_POST['email'])){
                if (is_post_request($_POST['email'])) {
        ?>
        <p class="exposition">Does your email address include an @ symbol?</p>
            <?php
                if (has_string($email,"@")){
                    echo 'Yes, it includes the @ symbol.';
                } else {
                    echo 'Nope, whoops, it sure doesn\'t.';
                }
            ?>
        <p class="exposition">Does your email appear to be in a valid format?</p>
            <?php
                if (has_valid_email_format($email)){
                    echo 'Yes, that sure looks like a valid email format to me!';
                } else {
                    array_push($errors, 'Sorry, you need to enter a valid email format!');
                    echo display_errors($errors=array());
                    echo 'Sorry, that does not appear to be in a valid format, try again';
                }
            ?>
        <?php
                }
            }
        ?>

    </section>

</body>
</html>