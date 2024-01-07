const handleKeyPress = (event) => {
    if (event.key === 'Enter') {
        searchFilter();
    }
}

const searchFilter = () => {
    let params = $("#searchInput").val();
    window.location.href = `/${params}`;
}