<h1>Get IP details</h1>

<div class="jumbotron">
    <?php if (isset($_GET["ip"])) : ?>
    <table class="table table-striped">
        <thead class="thead-light">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
              <th scope="row">Validation/Protocol</th>
              <td><?= $protocol ?></td>
            </tr>
            <tr>
              <th scope="row">Host</th>
              <td><?= $host ?></td>
            </tr>
            <tr>
              <th scope="row">Continent code</th>
              <td><?= $details["continent_code"] ?></td>
            </tr>

            <tr>
              <th scope="row">Continent name</th>
              <td><?= $details["continent_name"] ?></td>
            </tr>

            <tr>
              <th scope="row">Country code</th>
              <td><?= $details["country_code"] ?></td>
            </tr>

            <tr>
              <th scope="row">Country</th>
              <td><?= $details["country_name"] ?></td>
            </tr>

            <tr>
              <th scope="row">Region Code</th>
              <td><?= $details["region_code"] ?></td>
            </tr>

            <tr>
              <th scope="row">Region Name</th>
              <td><?= $details["region_name"] ?></td>
            </tr>

            <tr>
              <th scope="row">City</th>
              <td><?= $details["city"] ?></td>
            </tr>

            <tr>
              <th scope="row">Zip</th>
              <td><?= $details["zip"] ?></td>
            </tr>

            <tr>
              <th scope="row">Capital</th>
              <td><?= $details["location"]["capital"] ?></td>
            </tr>
            <tr>
              <th scope="row">Latitude</th>
              <td><?= $details["latitude"] ?></td>
            </tr>
            <tr>
              <th scope="row">Longitude</th>
              <td><?= $details["longitude"] ?></td>
            </tr>
            <tr>
                <th scope="row">Flag</th>
                <td> <img src=" <?= $details["location"]["country_flag"] ?>" alt="flag" height="50px"></td>
            </tr>
        </tbody>
    </table>

        <a href="validate"><button class="btn btn-primary btn-lg btn-block">Go back</button></a>

    <?php endif; ?>

    <?php if (!isset($_GET["ip"])) : ?>
        <form class="form-signin" method="get" action="">
            <div class="alert alert-primary" role="alert">
              Your IP address will be set by default
            </div>

            <div class="form-group">
                    <input class="form-control"  type="text" name="ip" value="<?= $currentIp ?>" required>
            </div>
            <button class="btn btn-primary btn-lg btn-block"  type="submit">Validate</button>
        </form>


    <?php endif; ?>
</div>
