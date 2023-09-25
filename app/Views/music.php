<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
    body {
        font-family: Arial, sans-serif;
        text-align: center;
        background-color: #f5f5f5;
        padding: 20px;
    }

    h1 {
        color: #333;
    }

    #player-container {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    audio {
        width: 100%;
    }

    #playlist {
        list-style: none;
        padding: 0;
    }

    #playlist li {
        cursor: pointer;
        padding: 10px;
        background-color: #eee;
        margin: 5px 0;
        transition: background-color 0.2s ease-in-out;
    }

    #playlist li:hover {
        background-color: #ddd;
    }

     #playlist li.active {
         background-color: #007bff;
         color: #fff;
     }
    </style>
</head>
<body>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <br>

            <a href="/playlist/" data-bs-toggle = "modal" data-bs-target ="#myModal">your playlist</a>
            <br>


        </div>
        <div class="modal-footer">
        <a href="#" data-bs-dismiss="modal">Close</a>
        <a href="#" data-bs-toggle="modal" data-bs-target="#create">Create New</a>

        </div>
      </div>
    </div>
  </div>

    <form action="/search" method="get">
    <input type="search" name="search" placeholder="Search a Song">
    <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <h1>Music Player</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    My Playlist
</button>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inserts">
    Upload Song
</button>

<audio id="audi " controls autoplay></audio>
<ul id="playlist">
<?php if ($music): ?>
    <?php foreach ($music as $music): ?>
        <li data-src="<?= base_url(); ?>/music/<?= $music['musicname'];?>.mp3"><?= $music['musicname']; ?>
            <a href="/addtoplaylist" class="hover-effect">
                <i class="fa-solid fa-plus"></i>
            </a>
        </li>
    <?php endforeach; ?>
<?php else: ?>
    <?php foreach ($music as $m): ?>
        <li data-src="<?= base_url(); ?>/music/<?= $m['musicname'];?>.mp3"><?= $m['musicname']; ?>
            <a href="/addtoplaylist" class="hover-effect">
                <i class="fa-solid fa-plus"></i>
            </a>
        </li>
    <?php endforeach; ?>
<?php endif; ?>
</ul>

    <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Select from playlist</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
          <form action="/" method="post">
            <!-- <p id="modalData"></p> -->
            <input type="hidden" id="musicID" name="musicID">
            <select  name="playlist" class="form-control" id ="playlist">
            <?php foreach($playlist as $play): ?>
              <option value="playlist"><?=$play['playlist']?></option>
            <?php endforeach;?>
            </select>
            <input type="submit" name="add">
            </form>
          </div>


          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>


    <div class="modal" id="inserts">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Upload Music</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
          <form action="/addsong" method="post">
            <!-- <p id="modalData"></p> -->
            <input type="hidden" id="musicID" name="musicID">
          <input type="file" name = "musicname">
          <input type="submit">
            </form>
          </div>


          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>

    <div class="modal" id="create">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Upload Music</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
          <form action="/createplaylist " method="post">
            <!-- <p id="modalData"></p> -->
            <input type="hidden" id="musicID" name="musicID">
          <input type="text" name = "playlist" placeholder="create playlist">
          <input type="submit">
            </form>
          </div>


          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>
    <script>
    $(document).ready(function () {
  // Get references to the button and modal
  const modal = $("#myModal");
  const modalData = $("#modalData");
  const musicID = $("#musicID");
  // Function to open the modal with the specified data
  function openModalWithData(dataId) {
    // Set the data inside the modal content
    modalData.text("Data ID: " + dataId);
    musicID.val(dataId);
    // Display the modal
    modal.css("display", "block");
  }

  // Add click event listeners to all open modal buttons

  // When the user clicks the close button or outside the modal, close it
  modal.click(function (event) {
    if (event.target === modal[0] || $(event.target).hasClass("close")) {
      modal.css("display", "none");
    }
  });
});
    </script>
    <script>
        const audio = document.getElementById('audio');
        const playlist = document.getElementById('playlist');
        const playlistItems = playlist.querySelectorAll('li');

        let currentTrack = 0;

        function playTrack(trackIndex) {
            if (trackIndex >= 0 && trackIndex < playlistItems.length) {
                const track = playlistItems[trackIndex];
                const trackSrc = track.getAttribute('data-src');
                audio.src = trackSrc;
                audio.play();
                currentTrack = trackIndex;
            }
        }

        function nextTrack() {
            currentTrack = (currentTrack + 1) % playlistItems.length;
            playTrack(currentTrack);
        }

        function previousTrack() {
            currentTrack = (currentTrack - 1 + playlistItems.length) % playlistItems.length;
            playTrack(currentTrack);
        }

        playlistItems.forEach((item, index) => {
            item.addEventListener('click', () => {
                playTrack(index);
            });
        });

        audio.addEventListener('ended', () => {
            nextTrack();
        });

        playTrack(currentTrack);
    </script>
</body>
</html>