(function() {

var listEl = document.getElementById('list');
var loaderEl = document.getElementById('list-loader');
var tableEl = document.getElementById('list-table');

var renderList = function(lecturers) {
    for (var i = 0; i < lecturers.length; i++) {
        var rowEl = document.createElement('tr');
        rowEl.className = 'list-table__tr';

        var idCellEl = document.createElement('td');
        idCellEl.className = 'list-table__td';
        idCellEl.innerText = lecturers[i].id;
        rowEl.appendChild(idCellEl);

        var titleCellEl = document.createElement('td');
        titleCellEl.className = 'list-table__td';
        titleCellEl.innerText = lecturers[i].title;
        rowEl.appendChild(titleCellEl);

        var nameCellEl = document.createElement('td');
        nameCellEl.className = 'list-table__td';
        nameCellEl.innerText = lecturers[i].name;
        rowEl.appendChild(nameCellEl);

        var subjectsCellEl = document.createElement('td');
        subjectsCellEl.className = 'list-table__td';
        // subjectsCellEl.innerText = lecturers[i].subjects;
        var subjectsListEl = document.createElement('div');
        subjectsListEl.className = 'subjects-list';
        for (var j = 0; j < lecturers[i].subjects.length; j++) {
            var subjectBadgeEl = document.createElement('div');
            subjectBadgeEl.className = 'subjects-list__badge';
            subjectBadgeEl.title = lecturers[i].subjects[j].name;
            subjectBadgeEl.innerText = lecturers[i].subjects[j].code;
            subjectsListEl.appendChild(subjectBadgeEl);
        }
        subjectsCellEl.appendChild(subjectsListEl);

        rowEl.appendChild(subjectsCellEl);

        tableEl.getElementsByTagName('tbody')[0].appendChild(rowEl)

        // listElementsHTML += '<tr class="list-table__tr"><td class="list-table__td">' + lecturers[i].id + '</td><td class="list-table__td">' +
        //     lecturers[i].title + '</td><td class="list-table__td">' + lecturers[i].name + '</td></tr>';
        // console.log(lecturers[i]);
    };

    // tableEl.innerHTML.replace(/\{\{ table Placeholder \}\}/, '<tr><td>Gówno</td></tr>');

    loaderEl.style.display = 'none';
    tableEl.style.display = 'block';
};

var http = new XMLHttpRequest();
var url = window.location.origin + '/api/lecturers/all';

http.onreadystatechange = function() {
    if (http.readyState === 4 && http.status === 200) {
        var lecturers = JSON.parse(http.responseText);

        renderList(lecturers);
    }
};
http.open('GET', url);
http.send();


})();