﻿/*
 * CKFinder
 * ========
 * http://ckfinder.com
 * Copyright (C) 2007-2010, CKSource - Frederico Knabben. All rights reserved.
 *
 * The software, this file and its contents are subject to the CKFinder
 * License. Please read the license.txt file before using, installing, copying,
 * modifying or distribute this file or part of its contents. The contents of
 * this file is part of the Source Code of CKFinder.
 *
 * ---
 * Greek language file.
 * Autor: Thanasis Fotis, Tessera Multimedia S.A. 
 * URL: http://www.tessera.gr
 * email: tfotis@tessera.gr
 */

var CKFLang =
{

Dir : 'ltr',
HelpLang : 'en',
LangCode : 'el',

// Date Format
//		d    : Day
//		dd   : Day (padding zero)
//		m    : Month
//		mm   : Month (padding zero)
//		yy   : Year (two digits)
//		yyyy : Year (four digits)
//		h    : Hour (12 hour clock)
//		hh   : Hour (12 hour clock, padding zero)
//		H    : Hour (24 hour clock)
//		HH   : Hour (24 hour clock, padding zero)
//		M    : Minute
//		MM   : Minute (padding zero)
//		a    : Firt char of AM/PM
//		aa   : AM/PM
DateTime : 'dd/mm/yyyy HH:MM',
DateAmPm : ['ΜΜ','ΠΜ'],

// Folders
FoldersTitle	: 'Φάκελοι',
FolderLoading	: 'Φόρτωση...',
FolderNew		: 'Παρακαλούμε πληκτρολογήστε την ονομασία του νέου φακέλου: ',
FolderRename	: 'Παρακαλούμε πληκτρολογήστε την νέα ονομασία του φακέλου: ',
FolderDelete	: 'Είστε σίγουροι ότι θέλετε να διαγράψετε το φάκελο "%1";',
FolderRenaming	: ' (Μετονομασία...)',
FolderDeleting	: ' (Διαγραφή...)',

// Files
FileRename		: 'Παρακαλούμε πληκτρολογήστε την νέα ονομασία του αρχείου: ',
FileRenameExt	: 'Είστε σίγουροι ότι θέλετε να αλλάξετε την επέκταση του αρχείου; Μετά από αυτή την ενέργεια το αρχείο μπορεί να μην μπορεί να χρησιμοποιηθεί',
FileRenaming	: 'Μετονομασία...',
FileDelete		: 'Είστε σίγουροι ότι θέλετε να διαγράψετε το αρχείο "%1"?',

// Toolbar Buttons (some used elsewhere)
Upload		: 'Μεταφόρτωση',
UploadTip	: 'Μεταφόρτωση Νέου Αρχείου',
Refresh		: 'Ανανέωση',
Settings	: 'Ρυθμίσεις',
Help		: 'Βοήθεια',
HelpTip		: 'Βοήθεια',

// Context Menus
Select		: 'Επιλογή',
SelectThumbnail : 'Επιλογή Μικρογραφίας',
View		: 'Προβολή',
Download	: 'Λήψη Αρχείου',

NewSubFolder	: 'Νέος Υποφάκελος',
Rename			: 'Μετονομασία',
Delete			: 'Διαγραφή',

// Generic
OkBtn		: 'OK',
CancelBtn	: 'Ακύρωση',
CloseBtn	: 'Κλείσιμο',

// Upload Panel
UploadTitle			: 'Μεταφόρτωση Νέου Αρχείου',
UploadSelectLbl		: 'επιλέξτε το αρχείο που θέλετε να μεταφερθεί κάνοντας κλίκ στο κουμπί',
UploadProgressLbl	: '(Η μεταφόρτωση εκτελείται, παρακαλούμε περιμένετε...)',
UploadBtn			: 'Μεταφόρτωση Επιλεγμένου Αρχείου',

UploadNoFileMsg		: 'Παρακαλούμε επιλέξτε ένα αρχείο από τον υπολογιστή σας',

// Settings Panel
SetTitle		: 'Ρυθμίσεις',
SetView			: 'Προβολή:',
SetViewThumb	: 'Μικρογραφίες',
SetViewList		: 'Λίστα',
SetDisplay		: 'Εμφάνιση:',
SetDisplayName	: 'Όνομα Αρχείου',
SetDisplayDate	: 'Ημερομηνία',
SetDisplaySize	: 'Μέγεθος Αρχείου',
SetSort			: 'Ταξινόμηση:',
SetSortName		: 'βάσει Όνοματος Αρχείου',
SetSortDate		: 'βάσει Ημερομήνιας',
SetSortSize		: 'βάσει Μεγέθους',

// Status Bar
FilesCountEmpty : '<Κενός Φάκελος>',
FilesCountOne	: '1 αρχείο',
FilesCountMany	: '%1 αρχεία',

// Size and Speed
Kb				: '%1 kB',
KbPerSecond		: '%1 kB/s',

// Connector Error Messages.
ErrorUnknown : 'Η ενέργεια δεν ήταν δυνατόν να εκτελεστεί. (Σφάλμα %1)',
Errors :
{
 10 : 'Λανθασμένη Εντολή.',
 11 : 'Το resource type δεν ήταν δυνατόν να προσδιορίστεί.',
 12 : 'Το resource type δεν είναι έγκυρο.',
102 : 'Το όνομα αρχείου ή φακέλου δεν είναι έγκυρο.',
103 : 'Δεν ήταν δυνατή η εκτέλεση της ενέργειας λόγω έλλειψης δικαιωμάτων ασφαλείας.',
104 : 'Δεν ήταν δυνατή η εκτέλεση της ενέργειας λόγω περιορισμών του συστήματος αρχείων.',
105 : 'Λανθασμένη Επέκταση Αρχείου.',
109 : 'Λανθασμένη Ενέργεια.',
110 : 'Άγνωστο Λάθος.',
115 : 'Το αρχείο ή φάκελος υπάρχει ήδη.',
116 : 'Ο φάκελος δεν βρέθηκε. Παρακαλούμε ανανεώστε τη σελίδα και προσπαθήστε ξανά.',
117 : 'Το αρχείο δεν βρέθηκε. Παρακαλούμε ανανεώστε τη σελίδα και προσπαθήστε ξανά.',
201 : 'Ένα αρχείο με την ίδια ονομασία υπάρχει ήδη. Το μεταφορτωμένο αρχείο μετονομάστηκε σε "%1"',
202 : 'Λανθασμένο Αρχείο',
203 : 'Λανθασμένο Αρχείο. Το μέγεθος του αρχείου είναι πολύ μεγάλο.',
204 : 'Το μεταφορτωμένο αρχείο είναι χαλασμένο.',
205 : 'Δεν υπάρχει προσωρινός φάκελος για να χρησιμοποιηθεί για τις μεταφορτώσεις των αρχείων.',
206 : 'Η μεταφόρτωση ακυρώθηκε για λόγους ασφαλείας. Το αρχείο περιέχει δεδομένα μορφής HTML.',
207 : 'Το μεταφορτωμένο αρχείο μετονομάστηκε σε "%1"',
500 : 'Ο πλοηγός αρχείων έχει απενεργοποιηθεί για λόγους ασφαλείας. Παρακαλούμε επικοινωνήστε με τον διαχειριστή της ιστοσελίδας και ελέγξτε το αρχείο ρυθμίσεων του πλοηγού (CKFinder).',
501 : 'Η υποστήριξη των μικρογραφιών έχει απενεργοποιηθεί.'
},

// Other Error Messages.
ErrorMsg :
{
FileEmpty		: 'Η ονομασία του αρχείου δεν μπορεί να είναι κενή',
FolderEmpty		: 'Η ονομασία του φακέλου δεν μπορεί να είναι κενή',

FileInvChar		: 'Η ονομασία του αρχείου δεν μπορεί να περιέχει τους ακόλουθους χαρακτήρες: \n\\ / : * ? " < > |',
FolderInvChar	: 'Η ονομασία του φακέλου δεν μπορεί να περιέχει τους ακόλουθους χαρακτήρες: \n\\ / : * ? " < > |',

PopupBlockView	: 'Δεν ήταν εφικτό να ανοίξει το αρχείο σε νέο παράθυρο. Παρακαλώ, ελέγξτε τις ρυθμίσεις τους πλοηγού σας και απενεργοποιήστε όλους τους popup blockers για αυτή την ιστοσελίδα.'
}

} ;
