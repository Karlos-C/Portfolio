jQuery(document).ready(function($) {
    let repoUrl = $('#github-feed').data('repo');

    if (!repoUrl) {
        $('#github-feed').html('<p>Aucun dépôt GitHub trouvé pour ce projet.</p>');
        return;
    }

    let repoParts = repoUrl.replace('https://github.com/', '').split('/');
    let user = repoParts[0];
    let repo = repoParts[1];

    $.ajax({
        url: githubFeed.ajax_url,
        type: 'POST',
        data: { action: 'fetch_github_commits', user: user, repo: repo },
        success: function(response) {
            let commits = JSON.parse(response);
            let html = '<ul>';
            commits.slice(0, 5).forEach(commit => {
                html += `<li><a href="${commit.html_url}" target="_blank">${commit.commit.message}</a> - ${commit.commit.author.name}</li>`;
            });
            html += '</ul>';
            $('#github-feed').html(html);
        },
        error: function() {
            $('#github-feed').html('<p>Impossible de récupérer les commits.</p>');
        }
    });
});