---------- Laravel Route와 Vue Router 연동 시 주의사항 ---------- 
** Laravel의 api.php만으로 통신을 한다면 특별히 신경써야할 부분은 없음 url의 변경은 Vue Router를 이용하면 됨
** 단, Laravel의 web.php만 이용하거나 api.php와 병행하여 사용한다면 아래의 사항들을 신경써야 함

1. Laravel Route에서 web.php에 정의 된 URL Path와 Vue Router에 정의된 URL Path는 항상 쌍을 이루고 있어야 함 
    ** 쌍을 이루고 있어야 별도의 Ajax처리 없이 처리가 가능 
    ** ex : vue router에 '/', '/board', '/login'이 존재 할 경우, Laravel의 web.php에도 '/', '/board', '/login'가 존재

2. Laravel Route web.php에서 모든 처리는 최종적으로 최상위 Vue Componenet를 불러오는 Blade Template(welcome.blade.php)로 리턴할 것 
    ** Blade Template은 편의에 따라 변경 가능 **

3. Laravel Route에서 Vue Componenet로 보내는 데이터는 JSON형태이며, props를 이용 할 것 
    ** 해당 컴포넌트에 props로 데이터를 보내는데, JSON이 아닐경우 데이터의 취급이 어렵거나 오류가 날 가능성 있음 **

4. props로 보내는 데이터명은 두 단어 이상의 조합일 경우, Blade Template에서는 단어 사이에 '-'를 꼭 넣을 것 
    ** ex : laravelData로 작명하고 싶은경우, Blade Template에서는 laravel-Data, Vue Component에서는 laravelData로 사용