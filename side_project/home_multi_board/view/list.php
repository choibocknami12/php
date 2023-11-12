<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/view/css/common.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title><?php echo $this->titleBoardName ?></title>
</head>
<body>
    <?php require_once("view/inc/header.php"); ?>

        <div class="text-center mt-5 mb-5">
            <h1><?php echo $this->titleBoardName ?></h1>
                <svg 
                xmlns="http://www.w3.org/2000/svg" 
                width="50" 
                height="40" 
                fill="currentColor" 
                class="bi bi-file-earmark-plus-fill" 
                viewBox="0 0 16 16"
                data-bs-toggle="modal" 
                data-bs-target="#modalInsert">
                    <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0z"/>
                </svg>
        </div>
        
        <!-- 모달직접만들기 -->
        <!-- <div id="modal" class="displayNone">
            <div id="modalw"></div>
            <button id="btnModalClose">닫기</button>
        </div> -->
    
    <main>

        <?php
            foreach($this->arrBoardInfo as $item) {
        ?>
            <div class="card" id="card<?php echo $item["id"]; ?>">
                <img src="<?php echo isset($item["b_img"]) ? "/"._PATH_USERIMG.$item["b_img"] : ""; ?>" class="card-img-top" alt="이미지 없음">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $item["b_title"] ?></h5>
                    <p class="card-text"><?php echo mb_substr($item["b_content"], 0, 10)."..."; ?></p>
                    
                    <!-- <button 
                        class="btn btn-primary" 
                        data-bs-toggle="modal" 
                        data-bs-target="#modalDetail">
                        상세
                    </button> -->
                    <button 
                            class="btn btn-primary"
                            onclick="openDetail(<?php echo $item['id'] ?>); return false;">
                        상세
                    </button>
                </div>
            </div>
        <?php
            }
        ?>
            
    </main>

    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button> -->

    <!-- 상세모달 -->
    <div class="modal fade" id="modalDetail" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="b_title">배고프다</h5>
              <button type="button" onclick="closeDetailModal(); return false;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <p>작성일: <span id="created_at"></span></p>
                <p>수정일: <span id="updated_at"></span></p>
                <p id="b_content">내 만두그라탕노ㅏ두고옴..</p>
                <br>
                <br>
                <img id="b_img" src="" class="card-img-top">
            </div>

            <!-- 만든것 -->
            <!-- <div class="modal-footer">
                <form action="/board/delete" method="POST">
                    <input type="hidden" name="id" id="deletId">
                    <input type="hidden" name="b_type" id="deletb_type">
                    <button id="del-btn" type="submit" style="" class="btn btn-secondary " data-bs-dismiss="modal">삭제</button>
                    <button type="button" onclick="closeDetailModal(); return false;" class="btn btn-secondary " data-bs-dismiss="modal">닫기</button>
                </form>
            </div> -->

            <!-- 샘이 만든거 -->
            <div class="modal-footer">
                <!-- 값을 받아올 곳을 찾아야함. input, span모두 가능함. -->
                <input type="hidden" id="del_id" value="">
                <button type="button" id="del_btn" class="btn btn-secondary me-auto p-2 bd-highlight" onclick="deleteCard(); return false;">삭제</button>
                <button type="button" onclick="closeDetailModal(); return false;" class="btn btn-secondary " data-bs-dismiss="modal">닫기</button>
                
            </div>

          </div>
        </div>
    </div>

    <!-- 작성모달 -->
    <div class="modal" id="modalInsert" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/board/add" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="b_type" value="<?php echo $this->boardType; ?>">

                    <div class="modal-header">
                        <input type="text" name="b_title" class="form-control" placeholder="제목을 입력하세요.">
                    </div>

                    <div class="modal-body">
                        <textarea class="form-control" name="b_content" cols="30" rows="10" placeholder="내용을 입력하세요."></textarea>
                        <br><br>
                        <input type="file" name="b_img" accept="image/*">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">작성</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="bg-dark fixed-bottom text-light text-center p-3">
        저작권
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="/view/js/common.js"></script>
</body>
</html>