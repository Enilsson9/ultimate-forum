

<h1>Get IP details (JSON)</h1>

<div class="jumbotron">
    <?php if (isset($_GET["ip"])) : ?>
        <pre>
            <?php echo json_encode($json, JSON_PRETTY_PRINT);?>
        </pre>
        <a href="json"><button class="btn btn-primary btn-lg">Go back</button></a>
    <?php endif; ?>
    <?php if (!isset($_GET["ip"])) : ?>
        <form class="form-signin" method="get">
            <div class="alert alert-primary" role="alert">
              Your IP address will be set by default
            </div>
            <div class="form-group">
                    <input class="form-control"  type="text" name="ip" value="<?= $currentIp ?>" required>
            </div>
            <button class="btn btn-primary btn-lg btn-block"  type="submit">Validate</button>
        </form>

        <h4> Test routes </h4>

        <p>My place</p>
        <p><a href="?ip=186.151.62.176">json?ip=186.151.62.176</a></p>
        <p>Facebook</p>
        <p><a href="?ip=2a03:2880:2110:df07:face:b00c::1">json?ip=2a03:2880:2110:df07:face:b00c::1</a></p>
        <p>Random</p>
        <p><a href="?ip=4.2.2.2">json?ip=4.2.2.2</a></p>
    <?php endif; ?>
</div>
