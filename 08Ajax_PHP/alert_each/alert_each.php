<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- 載入bs5 css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css"
        integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap');

        body {
            font-family: 'Noto Sans TC', 'Yu Gothic UI', sans-serif;
            background: #f8f6f2;
            color: #3c3c3c;
        }

        #todoApp {
            background: #fff9f4;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 20px rgba(150, 130, 120, 0.15);
            max-width: 600px;
            margin: 0 auto;
        }

        #newTodo {
            width: 75%;
            border: 1px solid #dbc8c1;
            border-radius: 8px;
            padding: 10px 15px;
            font-size: 16px;
            background-color: #fff;
            margin-right: 8px;
        }

        #addBtn,
        #clearAll {
            background-color: #b39bb0;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        #addBtn:hover,
        #clearAll:hover {
            background-color: #a18ca1;
        }

        ul#todoList {
            list-style: none;
            padding-left: 0;
            margin-top: 20px;
        }

        #todoList li {
            background-color: #f1ebea;
            border-radius: 10px;
            padding: 10px 15px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: background-color 0.3s ease;
        }

        #todoList li:hover {
            background-color: #e9dede;
        }

        .toggle {
            margin-right: 10px;
            transform: scale(1.2);
        }

        .title {
            flex-grow: 1;
            margin-left: 10px;
            font-size: 16px;
        }

        .editBtn,
        .delBtn {
            background-color: transparent;
            border: none;
            color: #785e74;
            font-weight: bold;
            margin-left: 5px;
            cursor: pointer;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.2s ease;
        }

        .editBtn:hover,
        .delBtn:hover {
            background-color: #e8dfe6;
        }

        p {
            margin-top: 20px;
            font-weight: 500;
            text-align: right;
            color: #59475d;
        }
    </style>

    </style>

</head>

<body>

    <div id="app" class="container my-3">
        <div id="todoApp">
            <input type="text" id="newTodo">
            <button id="addBtn">新增</button>
            <ul id="todoList"></ul>
            <button id="clearAll">刪除全部</button>
            <p>未完成數量: <span id="unDoneCount"></span></p>
        </div>
    </div>



    <!-- 載入bs5 js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/js/bootstrap.min.js"
        integrity="sha512-zKeerWHHuP3ar7kX2WKBSENzb+GJytFSBL6HrR2nPSR1kOX1qjm+oHooQtbDpDBSITgyl7QXZApvDfDWvKjkUw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- 載入jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            function fetchTodos() {
                $.get('./api/get.php', function(data) {
                    const todos = JSON.parse(data);
                    $('#todoList').empty();
                    let unDone = 0;
                    todos.forEach(todo => {
                        const checked = todo.completed ? 'checked' : '';
                        if (!todo.completed) unDone++;
                        $('#todoList').append(`
                            <li data-id="${todo.id}">
                                <input type="checkbox" class="toggle" ${checked}>
                                <span class="title">${todo.title}</span>
                                <button class="editBtn">編輯</button>
                                <button class="delBtn">刪除</button>
                            </li>
                         `);
                    });
                    $('#unDoneCount').text(unDone);
                });
            }

            $('#addBtn').click(function() {
                const title = $('#newTodo').val().trim();
                if (!title) return;

                $.post('./api/add.php', {
                    title: title
                }, function() {
                    $('#newTodo').val('');
                    fetchTodos();
                });
            });

            $('#todoList').on('click', '.delBtn', function() {
                const id = $(this).closest('li').data('id');
                $.post('./api/delete.php', {
                    id: id
                }, function() {
                    fetchTodos();
                });
            });

            $('#todoList').on('click', '.editBtn', function() {
                const li = $(this).closest('li');
                const id = li.data('id');
                const currentTitle = li.find('.title').text();
                const newTitle = prompt('修改內容：', currentTitle);
                if (newTitle && newTitle.trim()) {
                    $.post('./api/update.php', {
                        id: id,
                        title: newTitle
                    }, function() {
                        fetchTodos();
                    });
                }
            });

            $('#todoList').on('change', '.toggle', function() {
                const li = $(this).closest('li');
                const id = li.data('id');
                const completed = $(this).is(':checked') ? 1 : 0;
                $.post('./api/update.php', {
                    id: id,
                    completed: completed
                }, function() {
                    fetchTodos();
                });
            });

            $('#clearAll').click(function() {
                $.post('./api/clear.php', function() {
                    fetchTodos();
                });
            });

            fetchTodos();
        });
    </script>
</body>

</html>