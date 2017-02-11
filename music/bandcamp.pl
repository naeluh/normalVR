#!/usr/bin/perl
use JSON;
use LWP::Simple;
$timestamp = localtime(time);
mkdir $timestamp;
get(shift) =~ m/^\s+trackinfo : (.+),$/m;
$dat = from_json($1);
for (@$dat)
{
    $_->{title} =~ s/'/'"'"'/g;
    $_->{track_num} =~ s/^(\d)$/0\1/;
    fork or exec "wget '$_->{file}->{'mp3-128'}' -O '$timestamp/$_->{track_num} $_->{title}.mp3'";
}
$pid = wait until $pid < 0;
system "clear";
print "Done!\n";