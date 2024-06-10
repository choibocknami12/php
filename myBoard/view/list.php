<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/view/css/common.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://webfontworld.github.io/gmarket/GmarketSans.css" rel="stylesheet">
    <title>메인페이지</title>
</head>
<body class="vh-100">
    <?php require_once("view/inc/header.php"); ?>
    <main>
    <div class="main_container">
            <div class="main_list">
                <div class="main_list_todo_tit">
                    <div class="main_list_todo">
                        <div>
                            <span>할일</span>
                        </div>
                    </div>
                    <div class="main_list_todate">
                        <div>
                            <span>작성일자</span>
                        </div>
                    </div>
                </div>
                <div class="main_list_todo_list">
                    <div class="main_list_todo_div">
                        <div>
                            <button id="btnDetail" data-bs-toggle="modal" data-bs-target="#modalDetail" style="border: none; background-color: transparent;">
                                <span>복남이 똥치우기</span>
                            </button>
                        </div>
                    </div>
                    <div class="main_list_todate_time">
                        <span>24.06.09</span>
                    </div>
                </div>
                <div class="main_list_todo_list">
                    <div class="main_list_todo_div">
                        <div>
                            <button style="border: none; background-color: transparent;">
                                <span>복남이 똥치우기</span>
                            </button>
                        </div>
                    </div>
                    <div class="main_list_todate_time">
                        <span>24.06.09</span>
                    </div>
                </div>
                <div class="main_list_todo_list">
                    <div class="main_list_todo_div">
                        <div>
                            <button style="border: none; background-color: transparent;">
                                <span>복남이 똥치우기</span>
                            </button>
                        </div>
                    </div>
                    <div class="main_list_todate_time">
                        <span>24.06.09</span>
                    </div>
                </div>
            </div>
        </div>
        <div style="display: flex; flex-direction: column; align-items: center; gap: 10px;">
            <div class="main_search_bar" style="display: flex; align-items: center;">
                <nav class="navbar navbar-light">
                    <div class="container-fluid">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-primary" type="submit">Search</button>
                        </form>
                    </div>
                </nav>
                <div>
                    <div>
                        <button class="btn btn-outline-primary" type="submit">write</button>
                    </div>
                </div>
            </div>
            
            <div class="main_pagination">
                <nav aria-label="...">
                    <ul class="pagination pagination-m">
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">1</span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </main>

    <!-- 상세모달 -->
    <div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">할일 제목</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<span>할일 상세내용</span>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
				</div>
			</div>
		</div>
	</div>

    <?php require_once("view/inc/footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="/view/js/common.js"></script>
</body>
</html>